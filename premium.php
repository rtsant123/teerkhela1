<?php
/**
 * Premium Page - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Premium Features - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Premium Hero -->
<section class="premium-hero">
    <div class="container">
        <div class="premium-hero-content">
            <h1><i class="fas fa-crown"></i> Go Premium</h1>
            <p class="hero-tagline">Unlock Exclusive Features & Advanced Analytics</p>
            <p class="hero-description">Get early predictions, advanced analytics, instant notifications, and an ad-free experience!</p>
        </div>
    </div>
</section>

<!-- Pricing Plans -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2>Choose Your Plan</h2>
            <p>Select the perfect plan for your needs</p>
        </div>

        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Monthly</h3>
                    <div class="pricing-price">
                        <span class="currency">₹</span>
                        <span class="amount">199</span>
                        <span class="period">/month</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Early predictions</li>
                    <li><i class="fas fa-check"></i> Advanced analytics</li>
                    <li><i class="fas fa-check"></i> Push notifications</li>
                    <li><i class="fas fa-check"></i> Ad-free experience</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                </ul>
                <a href="#" class="btn btn-primary btn-large">Get Started</a>
            </div>

            <div class="pricing-card featured">
                <div class="pricing-badge">Most Popular</div>
                <div class="pricing-header">
                    <h3>Quarterly</h3>
                    <div class="pricing-price">
                        <span class="currency">₹</span>
                        <span class="amount">499</span>
                        <span class="period">/3 months</span>
                    </div>
                    <div class="pricing-save">Save 17%</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Early predictions</li>
                    <li><i class="fas fa-check"></i> Advanced analytics</li>
                    <li><i class="fas fa-check"></i> Push notifications</li>
                    <li><i class="fas fa-check"></i> Ad-free experience</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                    <li><i class="fas fa-check"></i> SMS alerts</li>
                </ul>
                <a href="#" class="btn btn-premium btn-large">Get Started</a>
            </div>

            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Yearly</h3>
                    <div class="pricing-price">
                        <span class="currency">₹</span>
                        <span class="amount">1,499</span>
                        <span class="period">/year</span>
                    </div>
                    <div class="pricing-save">Save 37%</div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Early predictions</li>
                    <li><i class="fas fa-check"></i> Advanced analytics</li>
                    <li><i class="fas fa-check"></i> Push notifications</li>
                    <li><i class="fas fa-check"></i> Ad-free experience</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                    <li><i class="fas fa-check"></i> SMS & Email alerts</li>
                    <li><i class="fas fa-check"></i> Dedicated account manager</li>
                </ul>
                <a href="#" class="btn btn-primary btn-large">Get Started</a>
            </div>
        </div>
    </div>
</section>

<!-- Premium Features -->
<section class="premium-features-section">
    <div class="container">
        <div class="section-header">
            <h2>Premium Features</h2>
            <p>Everything you need to stay ahead</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-crystal-ball"></i>
                </div>
                <h3>Early Predictions</h3>
                <p>Get predictions before results are declared based on advanced algorithms and historical patterns.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Advanced Analytics</h3>
                <p>Access detailed charts, trends, and patterns to make informed decisions.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Instant Notifications</h3>
                <p>Get push notifications the moment results are declared. Never miss an update.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-ad"></i>
                </div>
                <h3>Ad-Free Experience</h3>
                <p>Enjoy a clean, distraction-free interface without any advertisements.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sms"></i>
                </div>
                <h3>SMS Alerts</h3>
                <p>Receive results directly to your phone via SMS. Available in quarterly and yearly plans.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Priority Support</h3>
                <p>Get priority access to our support team with faster response times.</p>
            </div>
        </div>
    </div>
</section>

<!-- Payment Methods -->
<section class="payment-methods-section">
    <div class="container">
        <div class="section-header">
            <h2>Secure Payment Methods</h2>
            <p>We accept all major payment methods</p>
        </div>

        <div class="payment-methods">
            <div class="payment-icon"><i class="fab fa-cc-visa"></i></div>
            <div class="payment-icon"><i class="fab fa-cc-mastercard"></i></div>
            <div class="payment-icon"><i class="fab fa-cc-amex"></i></div>
            <div class="payment-icon"><i class="fas fa-university"></i></div>
            <div class="payment-text">UPI</div>
            <div class="payment-text">Paytm</div>
            <div class="payment-text">PhonePe</div>
            <div class="payment-text">GPay</div>
        </div>
    </div>
</section>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
