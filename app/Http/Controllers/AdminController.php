<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Banner;
use App\Models\ContactSubmission;
use App\Models\Popup;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show login page
     */
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ])->withInput();
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    /**
     * Dashboard overview
     */
    public function dashboard()
    {
        $stats = [
            'testimonials' => Testimonial::count(),
            'testimonials_visible' => Testimonial::visible()->count(),
            'banners' => Banner::count(),
            'banners_visible' => Banner::visible()->count(),
            'popups' => Popup::count(),
            'popups_active' => Popup::active()->count(),
            'submissions' => ContactSubmission::count(),
            'submissions_unread' => ContactSubmission::unread()->count(),
        ];

        $recentSubmissions = ContactSubmission::orderBy('created_at', 'desc')->limit(5)->get();
        $popupStats = Popup::active()->get(['id', 'title', 'impressions', 'clicks']);

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentSubmissions' => $recentSubmissions,
            'popupStats' => $popupStats,
        ]);
    }

    // ==================== TESTIMONIALS ====================

    /**
     * List all testimonials
     */
    public function testimonials()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show create testimonial form
     */
    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store new testimonial
     */
    public function storeTestimonial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'quote' => 'required|string|max:500',
            'amount' => 'nullable|string|max:50',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_visible' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'quote', 'amount', 'rating']);
        $data['is_visible'] = $request->has('is_visible');
        $data['sort_order'] = Testimonial::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'testimonials');
        }

        Testimonial::create($data);

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial added successfully!');
    }

    /**
     * Show edit testimonial form
     */
    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update testimonial
     */
    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'quote' => 'required|string|max:500',
            'amount' => 'nullable|string|max:50',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_visible' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['name', 'quote', 'amount', 'rating']);
        $data['is_visible'] = $request->has('is_visible');

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'testimonials');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Delete testimonial
     */
    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully!');
    }

    /**
     * Toggle testimonial visibility
     */
    public function toggleTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_visible' => !$testimonial->is_visible]);

        return back()->with('success', 'Visibility toggled successfully!');
    }

    // ==================== LINKS ====================

    /**
     * Show links management page
     */
    public function links()
    {
        $links = [
            'app_download_link' => Setting::get('app_download_link', env('APP_DOWNLOAD_LINK', '')),
            'play_store_link' => Setting::get('play_store_link', env('PLAY_STORE_LINK', '')),
            'app_store_link' => Setting::get('app_store_link', env('APP_STORE_LINK', '')),
            'whatsapp_link' => Setting::get('whatsapp_link', 'https://wa.me/' . env('WHATSAPP_NUMBER', '')),
            'premium_link' => Setting::get('premium_link', ''),
            'support_email' => Setting::get('support_email', env('MAIL_FROM_ADDRESS', '')),
            'facebook_url' => Setting::get('facebook_url', env('FACEBOOK_URL', '')),
            'twitter_url' => Setting::get('twitter_url', env('TWITTER_URL', '')),
            'instagram_url' => Setting::get('instagram_url', env('INSTAGRAM_URL', '')),
            'youtube_url' => Setting::get('youtube_url', env('YOUTUBE_URL', '')),
            'telegram_url' => Setting::get('telegram_url', env('TELEGRAM_URL', '')),
        ];

        return view('admin.links', compact('links'));
    }

    /**
     * Update links
     */
    public function updateLinks(Request $request)
    {
        $links = [
            'app_download_link',
            'play_store_link',
            'app_store_link',
            'whatsapp_link',
            'premium_link',
            'support_email',
            'facebook_url',
            'twitter_url',
            'instagram_url',
            'youtube_url',
            'telegram_url',
        ];

        foreach ($links as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key), 'links');
            }
        }

        return back()->with('success', 'Links updated successfully!');
    }

    // ==================== BANNERS ====================

    /**
     * List all banners
     */
    public function banners()
    {
        $banners = Banner::ordered()->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show create banner form
     */
    public function createBanner()
    {
        return view('admin.banners.create');
    }

    /**
     * Store new banner
     */
    public function storeBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'subtitle' => 'nullable|string|max:300',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'bg_color' => 'nullable|string|max:20',
            'bg_gradient' => 'nullable|string|max:100',
            'link_url' => 'nullable|url|max:500',
            'button_text' => 'nullable|string|max:50',
            'is_visible' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'subtitle', 'bg_color', 'bg_gradient', 'link_url', 'button_text']);
        $data['is_visible'] = $request->has('is_visible');
        $data['sort_order'] = Banner::max('sort_order') + 1;

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'banners');
        }

        Banner::create($data);

        return redirect()->route('admin.banners')->with('success', 'Banner added successfully!');
    }

    /**
     * Show edit banner form
     */
    public function editBanner($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update banner
     */
    public function updateBanner(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'subtitle' => 'nullable|string|max:300',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'bg_color' => 'nullable|string|max:20',
            'bg_gradient' => 'nullable|string|max:100',
            'link_url' => 'nullable|url|max:500',
            'button_text' => 'nullable|string|max:50',
            'is_visible' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'subtitle', 'bg_color', 'bg_gradient', 'link_url', 'button_text']);
        $data['is_visible'] = $request->has('is_visible');

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'banners');
        }

        $banner->update($data);

        return redirect()->route('admin.banners')->with('success', 'Banner updated successfully!');
    }

    /**
     * Delete banner
     */
    public function deleteBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.banners')->with('success', 'Banner deleted successfully!');
    }

    /**
     * Toggle banner visibility
     */
    public function toggleBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->update(['is_visible' => !$banner->is_visible]);

        return back()->with('success', 'Visibility toggled successfully!');
    }

    // ==================== POPUPS ====================

    /**
     * List all popups
     */
    public function popups()
    {
        $popups = Popup::orderBy('created_at', 'desc')->get();
        return view('admin.popups.index', compact('popups'));
    }

    /**
     * Show create popup form
     */
    public function createPopup()
    {
        return view('admin.popups.create');
    }

    /**
     * Store new popup
     */
    public function storePopup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:500',
            'display_rule' => 'required|in:every_visit,once_per_session,once_per_day,custom',
            'delay_seconds' => 'required|integer|min:0|max:60',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'description', 'button_text', 'button_link', 'display_rule', 'delay_seconds']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'popups');
        }

        Popup::create($data);

        return redirect()->route('admin.popups')->with('success', 'Popup created successfully!');
    }

    /**
     * Show edit popup form
     */
    public function editPopup($id)
    {
        $popup = Popup::findOrFail($id);
        return view('admin.popups.edit', compact('popup'));
    }

    /**
     * Update popup
     */
    public function updatePopup(Request $request, $id)
    {
        $popup = Popup::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url|max:500',
            'display_rule' => 'required|in:every_visit,once_per_session,once_per_day,custom',
            'delay_seconds' => 'required|integer|min:0|max:60',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only(['title', 'description', 'button_text', 'button_link', 'display_rule', 'delay_seconds']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image_url'] = $this->uploadImage($request->file('image'), 'popups');
        }

        $popup->update($data);

        return redirect()->route('admin.popups')->with('success', 'Popup updated successfully!');
    }

    /**
     * Delete popup
     */
    public function deletePopup($id)
    {
        $popup = Popup::findOrFail($id);
        $popup->delete();

        return redirect()->route('admin.popups')->with('success', 'Popup deleted successfully!');
    }

    /**
     * Toggle popup active status
     */
    public function togglePopup($id)
    {
        $popup = Popup::findOrFail($id);
        $popup->update(['is_active' => !$popup->is_active]);

        return back()->with('success', 'Status toggled successfully!');
    }

    /**
     * Reset popup statistics
     */
    public function resetPopupStats($id)
    {
        $popup = Popup::findOrFail($id);
        $popup->update(['impressions' => 0, 'clicks' => 0]);

        return back()->with('success', 'Statistics reset successfully!');
    }

    // ==================== SUBMISSIONS ====================

    /**
     * List all contact submissions
     */
    public function submissions(Request $request)
    {
        $query = ContactSubmission::orderBy('created_at', 'desc');

        if ($request->has('filter')) {
            if ($request->filter === 'unread') {
                $query->unread();
            }
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(20);

        return view('admin.submissions', compact('submissions'));
    }

    /**
     * View single submission
     */
    public function viewSubmission($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->markAsRead();

        return view('admin.submission-view', compact('submission'));
    }

    /**
     * Mark submission as read
     */
    public function markAsRead($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->markAsRead();

        return back()->with('success', 'Marked as read!');
    }

    /**
     * Delete submission
     */
    public function deleteSubmission($id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->delete();

        return redirect()->route('admin.submissions')->with('success', 'Submission deleted successfully!');
    }

    /**
     * Reply to submission
     */
    public function replySubmission(Request $request, $id)
    {
        $submission = ContactSubmission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'reply' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $submission->update([
            'admin_reply' => $request->reply,
            'replied_at' => now(),
            'is_read' => true,
        ]);

        // Send email reply (implement as needed)
        // Mail::to($submission->email)->send(new ContactReply($submission));

        return back()->with('success', 'Reply saved successfully!');
    }

    // ==================== SETTINGS ====================

    /**
     * Show settings page
     */
    public function settings()
    {
        $settings = [
            'app_name' => Setting::get('app_name', env('APP_NAME', 'Teer Khela Results')),
            'site_tagline' => Setting::get('site_tagline', 'Live Updates • Real-time Results'),
            'contact_email' => Setting::get('contact_email', env('MAIL_FROM_ADDRESS', '')),
            'whatsapp_number' => Setting::get('whatsapp_number', env('WHATSAPP_NUMBER', '')),
            'analytics_code' => Setting::get('analytics_code', ''),
            'enable_testimonials' => Setting::get('enable_testimonials', '1'),
            'enable_premium' => Setting::get('enable_premium', '1'),
            'enable_popups' => Setting::get('enable_popups', '1'),
            'maintenance_mode' => Setting::get('maintenance_mode', '0'),
        ];

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        $settingsToUpdate = [
            'app_name' => 'general',
            'site_tagline' => 'general',
            'contact_email' => 'general',
            'whatsapp_number' => 'general',
            'analytics_code' => 'general',
            'enable_testimonials' => 'features',
            'enable_premium' => 'features',
            'enable_popups' => 'features',
            'maintenance_mode' => 'general',
        ];

        foreach ($settingsToUpdate as $key => $group) {
            $value = $request->has($key) ? $request->input($key) : '0';

            // Handle checkboxes
            if (in_array($key, ['enable_testimonials', 'enable_premium', 'enable_popups', 'maintenance_mode'])) {
                $value = $request->has($key) ? '1' : '0';
            }

            Setting::set($key, $value, $group);
        }

        return back()->with('success', 'Settings updated successfully!');
    }

    /**
     * Change admin password
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully!');
    }

    // ==================== HELPERS ====================

    /**
     * Upload image to public folder
     */
    protected function uploadImage($file, $folder)
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("uploads/{$folder}"), $filename);
        return "/uploads/{$folder}/{$filename}";
    }
}
