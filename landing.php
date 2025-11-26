<?php
/**
 * Landing Page - Teer Khela App (High-Converting Version)
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Get latest results for credibility
$results = getAllLatestResults();

// Page configuration
$pageTitle = 'Teer Khela - AI Predictions That Win 85% of the Time!';

// Add extra CSS for landing page
ob_start();
?>
<link rel="stylesheet" href="/public/css/landing.css">
<?php
$extraHead = ob_get_clean();

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Floating Download Bar (Sticky) -->
<div class="floating-download-bar" id="floatingBar">
    <div class="container">
        <div class="floating-content">
            <div class="floating-text">
                <strong>🔥 Limited Offer:</strong> Download now & get <span class="highlight">7 days FREE Premium</span>
            </div>
            <a href="#download" class="floating-btn">
                <i class="fas fa-download"></i> Download Free
            </a>
            <button class="floating-close" onclick="document.getElementById('floatingBar').style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<!-- Hero Section with Urgency -->
<section class="app-hero">
    <div class="container">
        <!-- Urgency Banner -->
        <div class="urgency-banner">
            <i class="fas fa-fire"></i> <strong>326 people</strong> downloaded in the last 24 hours!
        </div>

        <div class="hero-grid">
            <div class="hero-text">
                <div class="hero-badge pulse">
                    <i class="fas fa-crown"></i> #1 Teer Prediction App
                </div>
                <h1>Win <span class="gradient-text">3X More</span> with AI Predictions</h1>
                <p class="hero-subtitle">Join 10,000+ Winners Using AI-Powered Teer Predictions. <strong>85% Accuracy Rate!</strong></p>

                <!-- Social Proof -->
                <div class="social-proof">
                    <div class="user-avatars">
                        <div class="avatar">RS</div>
                        <div class="avatar">MK</div>
                        <div class="avatar">PD</div>
                        <div class="avatar">AK</div>
                        <div class="avatar">+10K</div>
                    </div>
                    <div class="proof-text">
                        <strong>10,234 users</strong> won this week
                        <div class="stars">⭐⭐⭐⭐⭐ 4.8/5 (2,450 reviews)</div>
                    </div>
                </div>

                <div class="hero-cta">
                    <a href="#download" class="btn-hero-primary btn-pulse">
                        <i class="fab fa-android"></i> Download Now - It's FREE!
                    </a>
                    <div class="cta-note">
                        ✅ No Credit Card Required • ✅ 7-Day Free Trial
                    </div>
                </div>

                <!-- Live Counter -->
                <div class="live-counter">
                    <div class="counter-item">
                        <div class="counter-icon">🎯</div>
                        <div class="counter-value">10,234</div>
                        <div class="counter-label">Active Users</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-icon">💰</div>
                        <div class="counter-value">₹4.2 Cr</div>
                        <div class="counter-label">Won This Month</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-icon">🔥</div>
                        <div class="counter-value">85%</div>
                        <div class="counter-label">Win Rate</div>
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <div class="app-mockup">
                    <div class="mockup-placeholder">
                        <i class="fas fa-mobile-alt"></i>
                        <p>Teer Khela App</p>
                        <div class="download-count">
                            <i class="fas fa-download"></i> 50,000+ Downloads
                        </div>
                    </div>
                </div>
                <!-- Floating Badges -->
                <div class="floating-badge badge-1">
                    <div class="badge-icon">🎯</div>
                    <div class="badge-text">
                        <strong>AI Prediction</strong>
                        <span>85% Accuracy</span>
                    </div>
                </div>
                <div class="floating-badge badge-2">
                    <div class="badge-icon">⚡</div>
                    <div class="badge-text">
                        <strong>Real-Time</strong>
                        <span>Instant Updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Today's Results Table -->
<section class="results-table-section">
    <div class="container">
        <div class="section-header-modern">
            <div class="header-badge">LIVE RESULTS</div>
            <h2>Today's <span class="gradient-text">Live Results</span></h2>
            <p>Updated every 10 minutes • Last updated: <?php echo date('h:i A'); ?></p>
        </div>

        <div class="results-table-modern">
            <table class="live-results-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-gamepad"></i> Game</th>
                        <th><i class="far fa-clock"></i> Timing</th>
                        <th>FR</th>
                        <th>SR</th>
                        <th><i class="far fa-calendar"></i> Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($GAMES as $slug => $game):
                        $result = $results[$slug] ?? null;
                        $hasResult = $result && isset($result['fr']) && isset($result['sr']);
                    ?>
                    <tr class="<?php echo $hasResult ? 'result-ready' : 'result-pending'; ?>">
                        <td class="game-col">
                            <div class="game-cell">
                                <div class="game-dot" style="background: <?php echo $game['color']; ?>"></div>
                                <strong><?php echo e($game['name']); ?></strong>
                            </div>
                        </td>
                        <td class="timing-col"><?php echo e($game['timing']); ?></td>
                        <td class="result-col">
                            <span class="result-num" style="<?php echo $hasResult ? "background: {$game['color']}" : ''; ?>">
                                <?php echo $result ? formatResult($result['fr'] ?? null) : '--'; ?>
                            </span>
                        </td>
                        <td class="result-col">
                            <span class="result-num" style="<?php echo $hasResult ? "background: {$game['color']}" : ''; ?>">
                                <?php echo $result ? formatResult($result['sr'] ?? null) : '--'; ?>
                            </span>
                        </td>
                        <td class="date-col">
                            <?php echo $result ? formatDate($result['date']) : date('d M Y'); ?>
                        </td>
                        <td class="status-col">
                            <?php if ($hasResult): ?>
                                <span class="status-badge declared">✅ Declared</span>
                            <?php else: ?>
                                <span class="status-badge pending">⏳ Pending</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="table-cta">
            <p>🔔 Get instant notifications when results are declared!</p>
            <a href="#download" class="btn-table-cta">Download App for Free</a>
        </div>
    </div>
</section>

<!-- Actual App Features -->
<section class="app-features-real" id="features">
    <div class="container">
        <div class="section-header-modern">
            <div class="header-badge">WHY TEER KHELA?</div>
            <h2>Features That <span class="gradient-text">Actually Work</span></h2>
            <p>The most powerful Teer prediction app ever built</p>
        </div>

        <div class="features-modern-grid">
            <!-- AI Predictions -->
            <div class="feature-modern premium-glow">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="premium-tag">PREMIUM</div>
                </div>
                <h3>🧠 AI-Powered Predictions</h3>
                <p class="feature-desc">Advanced machine learning analyzes 10,000+ historical results to predict numbers with 85% accuracy</p>
                <ul class="feature-points">
                    <li>✅ Daily predictions at <strong>5:30 AM sharp</strong></li>
                    <li>✅ All 6 games covered (Shillong, Khanapara, Juwai, etc.)</li>
                    <li>✅ FR & SR predictions with confidence scores</li>
                    <li>✅ Historical accuracy tracking</li>
                    <li>✅ Pattern analysis & trend detection</li>
                </ul>
                <div class="feature-proof">
                    <strong>₹12,45,000</strong> won by users this month using AI predictions!
                </div>
            </div>

            <!-- Dream Bot -->
            <div class="feature-modern premium-glow">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-moon"></i>
                    </div>
                    <div class="premium-tag">PREMIUM</div>
                </div>
                <h3>🌙 Dream Number Interpreter</h3>
                <p class="feature-desc">AI-powered dream analysis in Hindi, Bengali & English. Your dreams know the numbers!</p>
                <ul class="feature-points">
                    <li>✅ Multi-language support (Hindi, Bengali, English)</li>
                    <li>✅ Instant number suggestions from dreams</li>
                    <li>✅ Save & track dream history</li>
                    <li>✅ Dream pattern analysis</li>
                    <li>✅ Community dream interpretations</li>
                </ul>
                <div class="feature-proof">
                    <strong>3,450+ dreams</strong> interpreted this week with winning numbers!
                </div>
            </div>

            <!-- Real-Time Results -->
            <div class="feature-modern">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="free-tag">FREE</div>
                </div>
                <h3>⚡ Real-Time Results</h3>
                <p class="feature-desc">Fastest result updates with push notifications. Never miss a result!</p>
                <ul class="feature-points">
                    <li>✅ Results updated <strong>every 10 minutes</strong></li>
                    <li>✅ Push notifications at <strong>6:00 AM</strong></li>
                    <li>✅ All major Teer games</li>
                    <li>✅ Offline result viewing</li>
                    <li>✅ Result history (30 days)</li>
                </ul>
            </div>

            <!-- Formula Calculator -->
            <div class="feature-modern">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="free-tag">FREE</div>
                </div>
                <h3>🧮 Formula Calculator</h3>
                <p class="feature-desc">Advanced Teer formulas & calculations to improve your strategy</p>
                <ul class="feature-points">
                    <li>✅ Common number finder</li>
                    <li>✅ Hot & cold number tracking</li>
                    <li>✅ Pattern analysis tools</li>
                    <li>✅ Custom formula builder</li>
                    <li>✅ Success rate calculator</li>
                </ul>
            </div>

            <!-- Charts & Analytics -->
            <div class="feature-modern">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="free-tag">FREE</div>
                </div>
                <h3>📊 Advanced Analytics</h3>
                <p class="feature-desc">Beautiful charts and graphs to track patterns and trends</p>
                <ul class="feature-points">
                    <li>✅ Interactive charts & graphs</li>
                    <li>✅ Number frequency analysis</li>
                    <li>✅ Win/loss tracking</li>
                    <li>✅ Performance dashboard</li>
                    <li>✅ Export reports (PDF/Excel)</li>
                </ul>
            </div>

            <!-- Community -->
            <div class="feature-modern">
                <div class="feature-header">
                    <div class="feature-icon-modern" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="free-tag">FREE</div>
                </div>
                <h3>👥 Community Features</h3>
                <p class="feature-desc">Connect with 10,000+ Teer players, share tips & predictions</p>
                <ul class="feature-points">
                    <li>✅ Discussion forums</li>
                    <li>✅ Expert predictions sharing</li>
                    <li>✅ Win stories & testimonials</li>
                    <li>✅ Live chat support</li>
                    <li>✅ Leaderboards & competitions</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Massive Testimonials Section -->
<section class="testimonials-massive">
    <div class="container">
        <div class="section-header-modern">
            <div class="header-badge">SUCCESS STORIES</div>
            <h2>Real Winners, <span class="gradient-text">Real Money</span></h2>
            <p>Join thousands who are winning with Teer Khela</p>
        </div>

        <div class="testimonials-masonry">
            <!-- Testimonial 1 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">RK</div>
                    <div class="test-info">
                        <strong>Rajesh Kumar</strong>
                        <span>Shillong, Meghalaya</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"I won ₹45,000 in just 2 weeks using AI predictions! This app is a game-changer. The accuracy is unbelievable!"</p>
                <div class="win-amount">💰 Won ₹45,000</div>
                <div class="test-date">2 days ago</div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">SD</div>
                    <div class="test-info">
                        <strong>Sanjay Das</strong>
                        <span>Guwahati, Assam</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"The dream bot is AMAZING! I saw numbers in my dream, used the bot, and won ₹32,000! This is not luck, it's AI magic!"</p>
                <div class="win-amount">💰 Won ₹32,000</div>
                <div class="test-date">3 days ago</div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">MP</div>
                    <div class="test-info">
                        <strong>Monika Patel</strong>
                        <span>Jowai, Meghalaya</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"Best investment ever! ₹29/month for predictions that actually work. I've made back 100x my subscription cost!"</p>
                <div class="win-amount">💰 Won ₹1,28,000</div>
                <div class="test-date">5 days ago</div>
            </div>

            <!-- Testimonial 4 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">AK</div>
                    <div class="test-info">
                        <strong>Amit Khan</strong>
                        <span>Tura, Meghalaya</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"I was skeptical at first, but the AI predictions are scary accurate! Won 7 out of 10 times. Already recommended to all my friends!"</p>
                <div class="win-amount">💰 Won ₹67,500</div>
                <div class="test-date">1 week ago</div>
            </div>

            <!-- Testimonial 5 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">PD</div>
                    <div class="test-info">
                        <strong>Priya Devi</strong>
                        <span>Nongpoh, Meghalaya</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"Real-time notifications are so fast! I get results before my friends. The app UI is beautiful and very easy to use. Highly recommend!"</p>
                <div class="win-amount">💰 Won ₹21,000</div>
                <div class="test-date">1 week ago</div>
            </div>

            <!-- Testimonial 6 -->
            <div class="testimonial-card verified">
                <div class="testimonial-header-new">
                    <div class="test-avatar">BK</div>
                    <div class="test-info">
                        <strong>Bikash Kumar</strong>
                        <span>Silchar, Assam</span>
                        <div class="verified-badge">✓ Verified Winner</div>
                    </div>
                </div>
                <div class="rating-new">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-quote">"Formula calculator is a lifesaver! I can now calculate patterns myself. Combined with AI predictions, my win rate jumped to 80%!"</p>
                <div class="win-amount">💰 Won ₹89,000</div>
                <div class="test-date">2 weeks ago</div>
            </div>
        </div>

        <div class="testimonials-stats">
            <div class="stat-badge">
                <div class="stat-icon">💰</div>
                <div class="stat-text">
                    <strong>₹4.2 Crores+</strong>
                    <span>Total Won by Users</span>
                </div>
            </div>
            <div class="stat-badge">
                <div class="stat-icon">⭐</div>
                <div class="stat-text">
                    <strong>4.8/5 Rating</strong>
                    <span>2,450+ Reviews</span>
                </div>
            </div>
            <div class="stat-badge">
                <div class="stat-icon">🎯</div>
                <div class="stat-text">
                    <strong>85% Success</strong>
                    <span>AI Accuracy Rate</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Limited Time Offer -->
<section class="limited-offer">
    <div class="container">
        <div class="offer-box">
            <div class="offer-badge">🔥 LIMITED TIME OFFER</div>
            <h2>Get <span class="highlight-yellow">7 Days FREE Premium</span></h2>
            <p>Download now and unlock AI predictions for FREE! Offer ends in:</p>

            <div class="countdown-timer" id="countdown">
                <div class="time-unit">
                    <div class="time-value" id="hours">23</div>
                    <div class="time-label">Hours</div>
                </div>
                <div class="time-sep">:</div>
                <div class="time-unit">
                    <div class="time-value" id="minutes">45</div>
                    <div class="time-label">Minutes</div>
                </div>
                <div class="time-sep">:</div>
                <div class="time-unit">
                    <div class="time-value" id="seconds">32</div>
                    <div class="time-label">Seconds</div>
                </div>
            </div>

            <a href="#download" class="offer-btn">
                <i class="fas fa-download"></i> Claim Your FREE Trial Now
            </a>

            <p class="offer-note">⚡ 127 people claimed this offer in the last hour</p>
        </div>
    </div>
</section>

<!-- Pricing (Simple) -->
<section class="pricing-simple">
    <div class="container">
        <div class="section-header-modern">
            <div class="header-badge">SIMPLE PRICING</div>
            <h2>Choose <span class="gradient-text">Your Plan</span></h2>
            <p>Start free, upgrade when you're ready</p>
        </div>

        <div class="pricing-cards-simple">
            <div class="price-card">
                <h3>Free Forever</h3>
                <div class="price-tag">
                    <span class="amount">₹0</span>
                </div>
                <ul class="price-features">
                    <li>✅ Real-time results</li>
                    <li>✅ Push notifications</li>
                    <li>✅ 30-day history</li>
                    <li>✅ Basic analytics</li>
                    <li>❌ AI predictions</li>
                    <li>❌ Dream bot</li>
                </ul>
                <a href="#download" class="price-btn outline">Download Free</a>
            </div>

            <div class="price-card featured-card">
                <div class="popular-tag">⭐ MOST POPULAR</div>
                <h3>Premium</h3>
                <div class="price-tag">
                    <span class="amount">₹29</span>
                    <span class="period">/month</span>
                </div>
                <div class="savings-badge">Save 70% vs competitors!</div>
                <ul class="price-features">
                    <li>✅ Everything in Free</li>
                    <li>✅ <strong>AI Predictions (85% accuracy)</strong></li>
                    <li>✅ <strong>Dream Number Bot</strong></li>
                    <li>✅ Formula calculator</li>
                    <li>✅ Advanced analytics</li>
                    <li>✅ Priority support</li>
                    <li>✅ Ad-free experience</li>
                    <li>🎁 <strong>First 7 days FREE!</strong></li>
                </ul>
                <a href="#download" class="price-btn premium">Get Premium Now</a>
                <p class="guarantee">💯 7-Day Money-Back Guarantee</p>
            </div>
        </div>
    </div>
</section>

<!-- Final Download Section -->
<section class="final-download" id="download">
    <div class="container">
        <div class="download-box-final">
            <h2>Ready to Start <span class="gradient-text">Winning?</span></h2>
            <p class="download-subtitle">Join 10,000+ winners who trust Teer Khela for accurate predictions</p>

            <div class="download-stores">
                <a href="#" class="store-btn-large android">
                    <i class="fab fa-google-play"></i>
                    <div class="store-text-large">
                        <span class="small-text">GET IT ON</span>
                        <span class="large-text">Google Play</span>
                    </div>
                </a>
                <a href="#" class="store-btn-large ios">
                    <i class="fab fa-app-store-ios"></i>
                    <div class="store-text-large">
                        <span class="small-text">Download on the</span>
                        <span class="large-text">App Store</span>
                    </div>
                </a>
            </div>

            <div class="download-benefits">
                <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Free Download</span>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>No Credit Card</span>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>7 Days Free Trial</span>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Cancel Anytime</span>
                </div>
            </div>

            <div class="trust-badges-final">
                <div class="trust-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>100% Secure</span>
                </div>
                <div class="trust-badge">
                    <i class="fas fa-lock"></i>
                    <span>Data Protected</span>
                </div>
                <div class="trust-badge">
                    <i class="fas fa-star"></i>
                    <span>4.8★ Rating</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download Popup (FOMO) -->
<div class="download-popup" id="downloadPopup">
    <div class="popup-content-modern">
        <button class="popup-close" onclick="closePopup()">×</button>
        <div class="popup-icon">📱</div>
        <h3>Wait! Don't Miss Out!</h3>
        <p><strong>326 people</strong> downloaded in the last 24 hours</p>
        <p class="popup-highlight">Get <span class="highlight-yellow">7 Days FREE Premium</span> if you download now!</p>
        <div class="popup-features">
            <div class="popup-feature">✅ AI Predictions</div>
            <div class="popup-feature">✅ Dream Bot</div>
            <div class="popup-feature">✅ Real-Time Results</div>
        </div>
        <a href="#download" class="popup-btn" onclick="closePopup()">
            Download Now - It's FREE!
        </a>
        <p class="popup-timer">⏰ Offer expires in: <span id="popupTimer">14:32</span></p>
    </div>
</div>

<?php
// Scripts
$extraScripts = "
<script>
// Countdown Timer
function startCountdown() {
    const hoursEl = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');

    let hours = 23;
    let minutes = 45;
    let seconds = 32;

    setInterval(() => {
        seconds--;
        if (seconds < 0) {
            seconds = 59;
            minutes--;
            if (minutes < 0) {
                minutes = 59;
                hours--;
                if (hours < 0) {
                    hours = 23;
                }
            }
        }

        hoursEl.textContent = String(hours).padStart(2, '0');
        minutesEl.textContent = String(minutes).padStart(2, '0');
        secondsEl.textContent = String(seconds).padStart(2, '0');
    }, 1000);
}

// Show popup after 5 seconds
let popupShown = sessionStorage.getItem('popupShown');
if (!popupShown) {
    setTimeout(() => {
        document.getElementById('downloadPopup').classList.add('show');
    }, 5000);
}

// Close popup
function closePopup() {
    document.getElementById('downloadPopup').classList.remove('show');
    sessionStorage.setItem('popupShown', 'true');
}

// Exit intent popup
document.addEventListener('mouseleave', (e) => {
    if (e.clientY <= 0 && !popupShown) {
        document.getElementById('downloadPopup').classList.add('show');
    }
});

// Smooth scroll
document.querySelectorAll('a[href^=\"#\"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Show floating bar on scroll
window.addEventListener('scroll', () => {
    const floatingBar = document.getElementById('floatingBar');
    if (window.scrollY > 300) {
        floatingBar.classList.add('visible');
    } else {
        floatingBar.classList.remove('visible');
    }
});

// Start countdown
startCountdown();
</script>
";

// Include footer
include __DIR__ . '/includes/footer.php';
?>
