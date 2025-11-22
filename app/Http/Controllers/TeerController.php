<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\ContactSubmission;
use App\Models\Popup;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TeerController extends Controller
{
    protected $games = [
        'bhutan-teer' => [
            'name' => 'Bhutan Teer',
            'slug' => 'bhutan-teer',
            'icon' => 'bhutan',
            'color' => '#FF6B6B',
            'timing' => '3:30 PM & 4:30 PM',
            'description' => 'Bhutan Teer is a popular archery-based lottery game from Bhutan with two rounds daily.',
        ],
        'juwai-teer' => [
            'name' => 'Juwai Teer',
            'slug' => 'juwai-teer',
            'icon' => 'juwai',
            'color' => '#4ECDC4',
            'timing' => '1:45 PM & 2:30 PM',
            'description' => 'Juwai Teer is conducted in the scenic town of Juwai in Meghalaya with exciting archery rounds.',
        ],
        'khanapara-teer' => [
            'name' => 'Khanapara Teer',
            'slug' => 'khanapara-teer',
            'icon' => 'khanapara',
            'color' => '#45B7D1',
            'timing' => '4:00 PM & 4:45 PM',
            'description' => 'Khanapara Teer is one of the oldest and most popular Teer games in Northeast India.',
        ],
        'shillong-night' => [
            'name' => 'Shillong Night',
            'slug' => 'shillong-night',
            'icon' => 'shillong-night',
            'color' => '#96CEB4',
            'timing' => '8:00 PM & 9:00 PM',
            'description' => 'Shillong Night Teer offers evening entertainment with archery-based lottery excitement.',
        ],
        'shillong-teer' => [
            'name' => 'Shillong Teer',
            'slug' => 'shillong-teer',
            'icon' => 'shillong',
            'color' => '#667EEA',
            'timing' => '3:45 PM & 4:45 PM',
            'description' => 'Shillong Teer is the most famous Teer game organized by the Khasi Hills Archery Sports Association.',
        ],
    ];

    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.teer_api.base_url', 'https://teerkhela-production.up.railway.app/api');
    }

    /**
     * Homepage
     */
    public function homepage()
    {
        $results = $this->getAllLatestResults();
        $testimonials = Testimonial::visible()->ordered()->limit(6)->get();
        $banners = Banner::visible()->ordered()->get();
        $popup = Popup::active()->first();

        return view('home', [
            'games' => $this->games,
            'results' => $results,
            'testimonials' => $testimonials,
            'banners' => $banners,
            'popup' => $popup,
        ]);
    }

    /**
     * Individual game results page
     */
    public function gameResults($game)
    {
        if (!isset($this->games[$game])) {
            abort(404);
        }

        $gameInfo = $this->games[$game];
        $latestResult = $this->getLatestResult($game);
        $history = $this->getResultHistory($game, 30);
        $statistics = $this->calculateStatistics($history);

        return view('game-results', [
            'game' => $gameInfo,
            'gameSlug' => $game,
            'latestResult' => $latestResult,
            'history' => $history,
            'statistics' => $statistics,
            'allGames' => $this->games,
        ]);
    }

    /**
     * Premium features page
     */
    public function premium()
    {
        return view('premium', [
            'games' => $this->games,
        ]);
    }

    /**
     * Support/FAQ page
     */
    public function support()
    {
        return view('support', [
            'faqs' => $this->getFaqs(),
        ]);
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        ContactSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you for contacting us! We will respond within 24 hours.');
    }

    /**
     * Download page/redirect
     */
    public function download()
    {
        $downloadLink = Setting::get('app_download_link', env('APP_DOWNLOAD_LINK', '#'));
        return view('download', [
            'downloadLink' => $downloadLink,
            'playStoreLink' => Setting::get('play_store_link', env('PLAY_STORE_LINK', '#')),
            'appStoreLink' => Setting::get('app_store_link', env('APP_STORE_LINK', '#')),
        ]);
    }

    /**
     * Terms and Conditions page
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * Privacy Policy page
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * Track popup impression via AJAX
     */
    public function trackPopupImpression(Request $request)
    {
        $popupId = $request->input('popup_id');
        $popup = Popup::find($popupId);

        if ($popup) {
            $popup->incrementImpressions();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    /**
     * Track popup click via AJAX
     */
    public function trackPopupClick(Request $request)
    {
        $popupId = $request->input('popup_id');
        $popup = Popup::find($popupId);

        if ($popup) {
            $popup->incrementClicks();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    /**
     * Get all latest results for all games
     */
    protected function getAllLatestResults()
    {
        $results = [];

        foreach ($this->games as $slug => $game) {
            $results[$slug] = $this->getLatestResult($slug);
        }

        return $results;
    }

    /**
     * Get latest result for a specific game
     * Smart caching: If both FR and SR are available, cache until midnight
     * If results are incomplete, cache for 2 minutes to check again
     */
    protected function getLatestResult($game)
    {
        $cacheKey = "latest_result_{$game}";
        $today = now()->toDateString();
        $todayCacheKey = "latest_result_{$game}_{$today}";

        // Check if we have complete results for today (both FR and SR)
        $cachedComplete = Cache::get($todayCacheKey);
        if ($cachedComplete) {
            return $cachedComplete;
        }

        // Try to get fresh data
        try {
            $response = Http::timeout(10)->get("{$this->apiBaseUrl}/results/{$game}/latest");

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['success']) && $data['success'] && isset($data['data'])) {
                    $result = $data['data'];

                    // Check if both FR and SR are available
                    $hasBothResults = isset($result['fr']) && $result['fr'] !== null
                                   && isset($result['sr']) && $result['sr'] !== null;

                    // Check if this result is for today
                    $resultDate = isset($result['date']) ? substr($result['date'], 0, 10) : null;
                    $isToday = $resultDate === $today;

                    if ($hasBothResults && $isToday) {
                        // Both results available for today - cache until midnight
                        $secondsUntilMidnight = now()->endOfDay()->diffInSeconds(now());
                        Cache::put($todayCacheKey, $result, $secondsUntilMidnight);
                        Cache::forget($cacheKey); // Clear the short-term cache
                        return $result;
                    } else {
                        // Results incomplete or from previous day - cache for 2 minutes
                        Cache::put($cacheKey, $result, 120);
                        return $result;
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error("Failed to fetch latest result for {$game}: " . $e->getMessage());
        }

        // Return cached data if API fails
        return Cache::get($cacheKey);
    }

    /**
     * Get result history for a game
     * Cache for 24 hours since past results don't change
     */
    protected function getResultHistory($game, $days = 30)
    {
        $cacheKey = "result_history_{$game}_{$days}";

        // Cache for 24 hours (86400 seconds) - past results don't change
        return Cache::remember($cacheKey, 86400, function () use ($game, $days) {
            try {
                $response = Http::timeout(15)->get("{$this->apiBaseUrl}/results/{$game}/history", [
                    'days' => $days,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    if (isset($data['success']) && $data['success'] && isset($data['data'])) {
                        return $data['data'];
                    }
                }
            } catch (\Exception $e) {
                \Log::error("Failed to fetch history for {$game}: " . $e->getMessage());
            }

            return [];
        });
    }

    /**
     * Calculate statistics from history data
     */
    protected function calculateStatistics($history)
    {
        if (empty($history)) {
            return [
                'total_results' => 0,
                'fr_average' => 0,
                'sr_average' => 0,
                'most_common_fr' => '-',
                'most_common_sr' => '-',
                'last_updated' => null,
            ];
        }

        $frValues = array_column($history, 'fr');
        $srValues = array_column($history, 'sr');

        $frValues = array_filter($frValues, fn($v) => $v !== null);
        $srValues = array_filter($srValues, fn($v) => $v !== null);

        return [
            'total_results' => count($history),
            'fr_average' => count($frValues) ? round(array_sum($frValues) / count($frValues), 1) : 0,
            'sr_average' => count($srValues) ? round(array_sum($srValues) / count($srValues), 1) : 0,
            'most_common_fr' => $this->getMostCommon($frValues),
            'most_common_sr' => $this->getMostCommon($srValues),
            'last_updated' => $history[0]['created_at'] ?? null,
        ];
    }

    /**
     * Get most common value from array
     */
    protected function getMostCommon($values)
    {
        if (empty($values)) {
            return '-';
        }

        $counts = array_count_values($values);
        arsort($counts);
        return (string) array_key_first($counts);
    }

    /**
     * Get FAQ items
     */
    protected function getFaqs()
    {
        return [
            [
                'question' => 'What is Teer?',
                'answer' => 'Teer is a traditional archery-based lottery game popular in Northeast India, particularly in Meghalaya. Archers shoot arrows at a target, and the last two digits of the total arrows hitting the target become the winning number.',
            ],
            [
                'question' => 'How are Teer results calculated?',
                'answer' => 'In each round, archers shoot a specific number of arrows at a target. The total number of arrows that hit the target is counted, and the last two digits of this total become the result. For example, if 1,247 arrows hit the target, the result is 47.',
            ],
            [
                'question' => 'What is FR and SR?',
                'answer' => 'FR stands for "First Round" and SR stands for "Second Round". Each Teer game typically has two rounds of shooting per day, hence two results.',
            ],
            [
                'question' => 'When are Teer results declared?',
                'answer' => 'Results are typically declared in the afternoon and evening, depending on the game. Shillong Teer results come around 3:45 PM and 4:45 PM, while Shillong Night results come around 8:00 PM and 9:00 PM.',
            ],
            [
                'question' => 'How can I get early predictions?',
                'answer' => 'Our premium subscription offers early predictions based on advanced analytics, historical patterns, and expert analysis. Subscribe to our premium service to access these features.',
            ],
            [
                'question' => 'Is Teer legal?',
                'answer' => 'Yes, Teer is legal in Meghalaya and is regulated by the Meghalaya Amusements and Betting Tax Act. It is conducted under the supervision of the Khasi Hills Archery Sports Association.',
            ],
            [
                'question' => 'How accurate are the results on this website?',
                'answer' => 'We fetch results directly from official sources and update them in real-time. Our results are highly accurate and updated within minutes of official declaration.',
            ],
            [
                'question' => 'How can I contact support?',
                'answer' => 'You can reach us through the contact form on this page, via WhatsApp, or by email. We typically respond within 24 hours.',
            ],
            [
                'question' => 'What payment methods do you accept for premium?',
                'answer' => 'We accept various payment methods including UPI, credit/debit cards, net banking, and popular wallets like Paytm and PhonePe.',
            ],
            [
                'question' => 'Can I cancel my premium subscription?',
                'answer' => 'Yes, you can cancel your subscription at any time. However, please note that refunds are processed according to our refund policy mentioned in the Terms and Conditions.',
            ],
        ];
    }
}
