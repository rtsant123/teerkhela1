<?php
/**
 * Download Page - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Download App - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Download Hero -->
<section class="download-hero">
    <div class="container">
        <div class="download-hero-content">
            <h1><i class="fas fa-mobile-alt"></i> Download Our App</h1>
            <p class="hero-tagline">Get Results on the Go</p>
            <p class="hero-description">Download our mobile app for instant push notifications, faster loading times, and a better user experience!</p>
        </div>
    </div>
</section>

<!-- Download Buttons -->
<section class="download-section">
    <div class="container">
        <div class="download-buttons-large">
            <a href="#" class="download-btn android">
                <div class="download-btn-icon">
                    <i class="fab fa-android"></i>
                </div>
                <div class="download-btn-text">
                    <span class="small">Download on</span>
                    <span class="large">Google Play</span>
                </div>
            </a>

            <a href="#" class="download-btn ios">
                <div class="download-btn-icon">
                    <i class="fab fa-apple"></i>
                </div>
                <div class="download-btn-text">
                    <span class="small">Download on</span>
                    <span class="large">App Store</span>
                </div>
            </a>

            <a href="#" class="download-btn apk">
                <div class="download-btn-icon">
                    <i class="fas fa-download"></i>
                </div>
                <div class="download-btn-text">
                    <span class="small">Direct Download</span>
                    <span class="large">APK File</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- App Features -->
<section class="app-features-section">
    <div class="container">
        <div class="section-header">
            <h2>App Features</h2>
            <p>Why you should download our app</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Push Notifications</h3>
                <p>Get instant notifications when results are declared. Never miss an update again.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Lightning Fast</h3>
                <p>Native app performance with faster loading times and smoother animations.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <h3>Offline Access</h3>
                <p>View previous results even when you're offline. Data is cached locally.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Optimized</h3>
                <p>Designed specifically for mobile devices with touch-friendly interface.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Secure & Safe</h3>
                <p>Your data is encrypted and secure. We respect your privacy.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync"></i>
                </div>
                <h3>Auto Updates</h3>
                <p>Results automatically refresh in the background without manual intervention.</p>
            </div>
        </div>
    </div>
</section>

<!-- App Screenshots -->
<section class="screenshots-section">
    <div class="container">
        <div class="section-header">
            <h2>App Screenshots</h2>
            <p>Preview our beautiful mobile app</p>
        </div>

        <div class="screenshots-placeholder">
            <p>Coming soon! Our app is currently under development.</p>
        </div>
    </div>
</section>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
