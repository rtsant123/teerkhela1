<?php
/**
 * Landing Page - Teer Khela App
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Get latest results for credibility
$results = getAllLatestResults();

// Page configuration
$pageTitle = 'Teer Khela - AI-Powered Predictions & Dream Interpretation';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section with App Showcase -->
<section class="app-hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-text">
                <div class="hero-badge">
                    <i class="fas fa-sparkles"></i> AI-Powered Predictions
                </div>
                <h1>Win More with <span class="gradient-text">Teer Khela</span></h1>
                <p class="hero-subtitle">Get accurate AI predictions, dream interpretations, and real-time results for all major Teer games</p>

                <div class="hero-features-list">
                    <div class="hero-feature-item">
                        <i class="fas fa-brain"></i>
                        <span>AI-Powered Predictions</span>
                    </div>
                    <div class="hero-feature-item">
                        <i class="fas fa-moon"></i>
                        <span>Dream Number Interpretation</span>
                    </div>
                    <div class="hero-feature-item">
                        <i class="fas fa-bolt"></i>
                        <span>Real-Time Results</span>
                    </div>
                </div>

                <div class="hero-cta">
                    <a href="#download" class="btn-hero-primary">
                        <i class="fab fa-android"></i> Download App
                    </a>
                    <a href="#features" class="btn-hero-secondary">
                        <i class="fas fa-play-circle"></i> See How It Works
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Active Users</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">85%</div>
                        <div class="stat-label">Accuracy Rate</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Live Updates</div>
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <div class="app-mockup">
                    <div class="mockup-placeholder">
                        <i class="fas fa-mobile-alt"></i>
                        <p>App Screenshot</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Live Results Ticker -->
<section class="live-ticker">
    <div class="container">
        <div class="ticker-header">
            <i class="fas fa-chart-line"></i> Live Results Today
        </div>
        <div class="ticker-content">
            <?php foreach ($GAMES as $slug => $game):
                $result = $results[$slug] ?? null;
            ?>
                <div class="ticker-item">
                    <strong><?php echo e($game['name']); ?>:</strong>
                    <span class="ticker-result">
                        FR: <?php echo $result ? formatResult($result['fr'] ?? null) : '--'; ?>
                    </span>
                    <span class="ticker-result">
                        SR: <?php echo $result ? formatResult($result['sr'] ?? null) : '--'; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-showcase" id="features">
    <div class="container">
        <div class="section-header centered">
            <h2>Powerful Features to <span class="gradient-text">Win Big</span></h2>
            <p>Everything you need to make informed decisions</p>
        </div>

        <div class="features-grid-large">
            <!-- AI Predictions -->
            <div class="feature-box premium-feature">
                <div class="feature-icon-large">
                    <i class="fas fa-brain"></i>
                </div>
                <h3>AI-Powered Predictions</h3>
                <p>Advanced algorithms analyze historical data to generate accurate predictions daily at 5:30 AM</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Historical pattern analysis</li>
                    <li><i class="fas fa-check"></i> Daily predictions for 6 games</li>
                    <li><i class="fas fa-check"></i> 85%+ accuracy rate</li>
                    <li><i class="fas fa-check"></i> Updated every morning</li>
                </ul>
                <span class="premium-badge"><i class="fas fa-crown"></i> Premium</span>
            </div>

            <!-- Dream Interpretation -->
            <div class="feature-box premium-feature">
                <div class="feature-icon-large">
                    <i class="fas fa-moon"></i>
                </div>
                <h3>Dream Number Bot</h3>
                <p>Multi-language dream interpretation that suggests lucky numbers based on your dreams</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Hindi, Bengali, English support</li>
                    <li><i class="fas fa-check"></i> AI dream analysis</li>
                    <li><i class="fas fa-check"></i> Instant number suggestions</li>
                    <li><i class="fas fa-check"></i> Save dream history</li>
                </ul>
                <span class="premium-badge"><i class="fas fa-crown"></i> Premium</span>
            </div>

            <!-- Real-Time Results -->
            <div class="feature-box">
                <div class="feature-icon-large">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Real-Time Results</h3>
                <p>Get instant notifications when results are declared. Never miss an update!</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Push notifications</li>
                    <li><i class="fas fa-check"></i> Updates every 10 minutes</li>
                    <li><i class="fas fa-check"></i> Morning alerts at 6:00 AM</li>
                    <li><i class="fas fa-check"></i> All major Teer games</li>
                </ul>
                <span class="free-badge"><i class="fas fa-check-circle"></i> Free</span>
            </div>

            <!-- Analytics & History -->
            <div class="feature-box">
                <div class="feature-icon-large">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h3>Advanced Analytics</h3>
                <p>Track patterns, common numbers, and historical data to improve your strategy</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Common number tracking</li>
                    <li><i class="fas fa-check"></i> Formula calculations</li>
                    <li><i class="fas fa-check"></i> 30-day history</li>
                    <li><i class="fas fa-check"></i> Pattern recognition</li>
                </ul>
                <span class="free-badge"><i class="fas fa-check-circle"></i> Free</span>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <div class="section-header centered">
            <h2>How It <span class="gradient-text">Works</span></h2>
            <p>Get started in 3 simple steps</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-icon">
                    <i class="fas fa-download"></i>
                </div>
                <h3>Download App</h3>
                <p>Get the Teer Khela app from Play Store or App Store</p>
            </div>

            <div class="step-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h3>Subscribe Premium</h3>
                <p>Get access to AI predictions and dream bot for just ₹29/month</p>
            </div>

            <div class="step-arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="step-card">
                <div class="step-number">3</div>
                <div class="step-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Start Winning</h3>
                <p>Use AI predictions and dream interpretations to make smart decisions</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-showcase">
    <div class="container">
        <div class="section-header centered">
            <h2>Simple <span class="gradient-text">Pricing</span></h2>
            <p>Choose the plan that's right for you</p>
        </div>

        <div class="pricing-comparison">
            <!-- Free Plan -->
            <div class="pricing-plan">
                <div class="plan-header">
                    <h3>Free</h3>
                    <div class="plan-price">
                        <span class="currency">₹</span>
                        <span class="amount">0</span>
                        <span class="period">/forever</span>
                    </div>
                </div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> Real-time results</li>
                    <li><i class="fas fa-check"></i> Push notifications</li>
                    <li><i class="fas fa-check"></i> 30-day history</li>
                    <li><i class="fas fa-check"></i> Basic analytics</li>
                    <li class="disabled"><i class="fas fa-times"></i> AI predictions</li>
                    <li class="disabled"><i class="fas fa-times"></i> Dream bot</li>
                    <li class="disabled"><i class="fas fa-times"></i> Advanced analytics</li>
                </ul>
                <a href="#download" class="plan-btn btn-outline">Download Free</a>
            </div>

            <!-- Premium Plan -->
            <div class="pricing-plan featured">
                <div class="popular-badge">Most Popular</div>
                <div class="plan-header">
                    <h3>Premium</h3>
                    <div class="plan-price">
                        <span class="currency">₹</span>
                        <span class="amount">29</span>
                        <span class="period">/month</span>
                    </div>
                </div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> Everything in Free</li>
                    <li><i class="fas fa-check"></i> <strong>AI-Powered Predictions</strong></li>
                    <li><i class="fas fa-check"></i> <strong>Dream Number Bot</strong></li>
                    <li><i class="fas fa-check"></i> Advanced analytics</li>
                    <li><i class="fas fa-check"></i> Formula calculations</li>
                    <li><i class="fas fa-check"></i> Common number tracking</li>
                    <li><i class="fas fa-check"></i> Priority support</li>
                </ul>
                <a href="#download" class="plan-btn btn-premium">Get Premium Now</a>
                <p class="plan-note">Auto-renewing • Cancel anytime • Secure payment via Razorpay</p>
            </div>
        </div>
    </div>
</section>

<!-- Download Section -->
<section class="download-showcase" id="download">
    <div class="container">
        <div class="download-content">
            <div class="download-text">
                <h2>Download <span class="gradient-text">Teer Khela</span> Now</h2>
                <p>Join thousands of users who are winning with AI predictions</p>

                <div class="download-buttons">
                    <a href="#" class="store-button">
                        <i class="fab fa-google-play"></i>
                        <div class="store-text">
                            <span class="small">GET IT ON</span>
                            <span class="large">Google Play</span>
                        </div>
                    </a>
                    <a href="#" class="store-button">
                        <i class="fab fa-app-store-ios"></i>
                        <div class="store-text">
                            <span class="small">Download on the</span>
                            <span class="large">App Store</span>
                        </div>
                    </a>
                </div>

                <div class="download-info">
                    <div class="info-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>100% Secure</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Android & iOS</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-download"></i>
                        <span>Free Download</span>
                    </div>
                </div>
            </div>

            <div class="download-image">
                <div class="phone-mockup">
                    <i class="fas fa-mobile-alt"></i>
                    <p>App Preview</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-showcase">
    <div class="container">
        <div class="section-header centered">
            <h2>What Our <span class="gradient-text">Users Say</span></h2>
            <p>Real reviews from real winners</p>
        </div>

        <div class="testimonials-grid-modern">
            <div class="testimonial-modern">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"The AI predictions are incredibly accurate! I've won more in the last month than ever before. The dream bot is a unique feature that actually works!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">RK</div>
                    <div class="author-info">
                        <strong>Rajesh Kumar</strong>
                        <span>Shillong, Meghalaya</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-modern">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Best Teer app I've used. Real-time notifications, accurate predictions, and the interface is so easy to use. Worth every rupee!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">SD</div>
                    <div class="author-info">
                        <strong>Sanjay Das</strong>
                        <span>Guwahati, Assam</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-modern">
                <div class="testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"The dream interpretation feature is amazing! It helped me find lucky numbers from my dreams. Highly recommended for serious Teer players."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">MP</div>
                    <div class="author-info">
                        <strong>Monika Patel</strong>
                        <span>Jowai, Meghalaya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-modern">
    <div class="container">
        <div class="section-header centered">
            <h2>Frequently Asked <span class="gradient-text">Questions</span></h2>
            <p>Everything you need to know</p>
        </div>

        <div class="faq-container">
            <div class="faq-item-modern">
                <div class="faq-question-modern">
                    <h3>How accurate are the AI predictions?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer-modern">
                    <p>Our AI predictions have an accuracy rate of 85%+ based on historical data analysis. The algorithm analyzes patterns from thousands of past results to generate daily predictions.</p>
                </div>
            </div>

            <div class="faq-item-modern">
                <div class="faq-question-modern">
                    <h3>How does the dream bot work?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer-modern">
                    <p>Our multi-language dream bot uses AI to interpret your dreams and suggest lucky numbers. Simply describe your dream in Hindi, Bengali, or English, and get instant number suggestions.</p>
                </div>
            </div>

            <div class="faq-item-modern">
                <div class="faq-question-modern">
                    <h3>Can I cancel my subscription anytime?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer-modern">
                    <p>Yes! You can cancel your premium subscription at any time from the app settings. No questions asked, no hidden fees.</p>
                </div>
            </div>

            <div class="faq-item-modern">
                <div class="faq-question-modern">
                    <h3>Which Teer games are supported?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer-modern">
                    <p>We support all major Teer games: Shillong Teer, Khanapara Teer, Juwai Teer, Shillong Night, Bhutan Teer, and more. All games get real-time updates and AI predictions.</p>
                </div>
            </div>

            <div class="faq-item-modern">
                <div class="faq-question-modern">
                    <h3>Is the payment secure?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer-modern">
                    <p>Absolutely! We use Razorpay, India's most trusted payment gateway. Your card details are encrypted and never stored on our servers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="final-cta">
    <div class="container">
        <div class="cta-box">
            <h2>Ready to Start Winning?</h2>
            <p>Download Teer Khela now and get your first AI prediction free!</p>
            <div class="cta-buttons">
                <a href="#download" class="btn-cta-large">
                    <i class="fas fa-download"></i> Download Free Now
                </a>
                <a href="#features" class="btn-cta-outline">
                    <i class="fas fa-play-circle"></i> Learn More
                </a>
            </div>
            <p class="cta-note">
                <i class="fas fa-check-circle"></i> No credit card required •
                <i class="fas fa-check-circle"></i> Free forever •
                <i class="fas fa-check-circle"></i> Premium from ₹29/month
            </p>
        </div>
    </div>
</section>

<?php
// FAQ Toggle Script
$extraScripts = "
<script>
    // FAQ Toggle
    document.querySelectorAll('.faq-question-modern').forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentElement;
            const isActive = item.classList.contains('active');

            // Close all FAQs
            document.querySelectorAll('.faq-item-modern').forEach(i => i.classList.remove('active'));

            // Open clicked FAQ if it wasn't active
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^=\"#\"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
";

// Include footer
include __DIR__ . '/includes/footer.php';
?>
