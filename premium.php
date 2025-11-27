<?php
/**
 * App Features Page - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Download App - Teer Khela Results Mobile App';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- App Hero -->
<section class="premium-hero">
    <div class="container">
        <div class="premium-hero-content">
            <h1><i class="fas fa-mobile-alt"></i> Download Teer Khela App</h1>
            <p class="hero-tagline">Fast • Reliable • Real-time Results</p>
            <p class="hero-description">Experience the best way to check Teer results with our powerful mobile app. Get instant notifications, predictions, and complete result history right in your pocket!</p>
            <div class="hero-buttons" style="margin-top: 30px; justify-content: center;">
                <a href="/download.php" class="btn btn-primary btn-large">
                    <i class="fab fa-android"></i> Download for Android
                </a>
                <a href="/download.php" class="btn btn-secondary btn-large">
                    <i class="fab fa-apple"></i> Coming Soon on iOS
                </a>
            </div>
        </div>
    </div>
</section>

<!-- App Features Showcase -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2>Why Download Our App?</h2>
            <p>Everything you need in one powerful mobile application</p>
        </div>

        <div class="features-grid" style="margin-top: 50px;">
            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Instant Push Notifications</h3>
                <p>Get results the moment they're declared. Never miss an update with real-time push notifications delivered straight to your phone.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Advanced Analytics</h3>
                <p>Analyze trends, view detailed statistics, and access comprehensive charts for all Teer games with our powerful analytics tools.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <i class="fas fa-crystal-ball"></i>
                </div>
                <h3>Smart Predictions</h3>
                <p>Access AI-powered predictions based on historical data and advanced algorithms to help you make informed decisions.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <i class="fas fa-history"></i>
                </div>
                <h3>Complete History</h3>
                <p>Browse unlimited result history with powerful search and filter options. Access years of data at your fingertips.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <i class="fas fa-moon"></i>
                </div>
                <h3>Dark Mode</h3>
                <p>Comfortable viewing experience day or night with our beautiful dark mode interface that's easy on the eyes.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3>Lightning Fast</h3>
                <p>Optimized for speed and performance. Load results instantly even on slow internet connections with our efficient app.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                    <i class="fas fa-bookmark"></i>
                </div>
                <h3>Save Favorites</h3>
                <p>Bookmark your favorite Teer games and access them quickly. Customize your experience with personalized preferences.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                    <i class="fas fa-share-alt"></i>
                </div>
                <h3>Easy Sharing</h3>
                <p>Share results instantly with friends via WhatsApp, Facebook, or any messaging app with just one tap.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                    <i class="fas fa-ad"></i>
                </div>
                <h3>Minimal Ads</h3>
                <p>Enjoy a clean, distraction-free interface with minimal, non-intrusive ads that don't interfere with your experience.</p>
            </div>
        </div>
    </div>
</section>

<!-- App Screenshots Section -->
<section class="premium-features-section">
    <div class="container">
        <div class="section-header">
            <h2>Simple, Beautiful, Powerful</h2>
            <p>Designed for the best user experience</p>
        </div>

        <div class="features-grid" style="max-width: 900px; margin: 0 auto;">
            <div class="feature-card" style="text-align: center; padding: 40px;">
                <i class="fas fa-mobile-alt" style="font-size: 80px; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h3>Beautiful Interface</h3>
                <p>Clean, modern design that makes checking results a pleasure. Intuitive navigation gets you where you need to go instantly.</p>
            </div>

            <div class="feature-card" style="text-align: center; padding: 40px;">
                <i class="fas fa-download" style="font-size: 80px; color: var(--accent-color); margin-bottom: 20px;"></i>
                <h3>Small Download Size</h3>
                <p>Under 10MB download size means you can install it quickly even on slow connections. Lightweight and efficient.</p>
            </div>

            <div class="feature-card" style="text-align: center; padding: 40px;">
                <i class="fas fa-shield-alt" style="font-size: 80px; color: var(--success-color); margin-bottom: 20px;"></i>
                <h3>Safe & Secure</h3>
                <p>Your data is always safe with us. No unnecessary permissions, no data collection, just pure functionality.</p>
            </div>
        </div>
    </div>
</section>

<!-- Download CTA -->
<section class="premium-final-cta">
    <div class="container">
        <div class="final-cta-content">
            <h2><i class="fas fa-mobile-alt"></i> Download Now & Never Miss a Result!</h2>
            <p>Join thousands of users who trust our app for accurate, real-time Teer results</p>
            <div class="hero-buttons" style="margin-top: 30px; justify-content: center;">
                <a href="/download.php" class="btn btn-large" style="background: var(--white); color: var(--primary-color); font-weight: 700;">
                    <i class="fab fa-android"></i> Get Android App
                </a>
            </div>
            <p style="margin-top: 20px; font-size: 14px; opacity: 0.8;">
                <i class="fas fa-check-circle"></i> Free Download
                <span style="margin: 0 10px;">•</span>
                <i class="fas fa-check-circle"></i> No Registration Required
                <span style="margin: 0 10px;">•</span>
                <i class="fas fa-check-circle"></i> Instant Access
            </p>
        </div>
    </div>
</section>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
