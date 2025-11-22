@extends('layouts.app')

@section('title', 'Premium Features - Teer Khela Results')

@section('content')
<!-- Premium Hero -->
<section class="premium-hero">
    <div class="container">
        <div class="premium-hero-content">
            <div class="premium-badge"><i class="fas fa-crown"></i> Premium</div>
            <h1>Unlock Premium Features</h1>
            <p>Get the most out of your Teer experience with exclusive premium features</p>
        </div>
    </div>
</section>

<!-- Features Comparison -->
<section class="comparison-section">
    <div class="container">
        <div class="section-header">
            <h2>Free vs Premium</h2>
            <p>See what you get with Premium membership</p>
        </div>

        <div class="comparison-table-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Free</th>
                        <th class="premium-col">Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Live Results</td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Result History (30 Days)</td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Basic Statistics</td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Early Predictions</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Advanced Analytics</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Win Pattern Analysis</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>SMS Notifications</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Email Alerts</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Ad-Free Experience</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Priority Support</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                    <tr>
                        <td>Result History (90 Days)</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td class="premium-col"><i class="fas fa-check text-success"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2>Choose Your Plan</h2>
            <p>Flexible pricing options to suit your needs</p>
        </div>

        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Weekly</h3>
                    <div class="price">
                        <span class="currency">&#8377;</span>
                        <span class="amount">99</span>
                        <span class="period">/week</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> All Premium Features</li>
                    <li><i class="fas fa-check"></i> Early Predictions</li>
                    <li><i class="fas fa-check"></i> SMS Notifications</li>
                    <li><i class="fas fa-check"></i> Ad-Free Experience</li>
                    <li><i class="fas fa-check"></i> 7 Days Access</li>
                </ul>
                <a href="#" class="btn btn-outline btn-full">Get Started</a>
            </div>

            <div class="pricing-card featured">
                <div class="pricing-badge">Most Popular</div>
                <div class="pricing-header">
                    <h3>Monthly</h3>
                    <div class="price">
                        <span class="currency">&#8377;</span>
                        <span class="amount">299</span>
                        <span class="period">/month</span>
                    </div>
                    <span class="savings">Save 25%</span>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> All Premium Features</li>
                    <li><i class="fas fa-check"></i> Early Predictions</li>
                    <li><i class="fas fa-check"></i> SMS + Email Notifications</li>
                    <li><i class="fas fa-check"></i> Ad-Free Experience</li>
                    <li><i class="fas fa-check"></i> Advanced Analytics</li>
                    <li><i class="fas fa-check"></i> 30 Days Access</li>
                </ul>
                <a href="#" class="btn btn-premium btn-full">Get Started</a>
            </div>

            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Yearly</h3>
                    <div class="price">
                        <span class="currency">&#8377;</span>
                        <span class="amount">1999</span>
                        <span class="period">/year</span>
                    </div>
                    <span class="savings">Save 45%</span>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> All Premium Features</li>
                    <li><i class="fas fa-check"></i> Early Predictions</li>
                    <li><i class="fas fa-check"></i> SMS + Email Notifications</li>
                    <li><i class="fas fa-check"></i> Ad-Free Experience</li>
                    <li><i class="fas fa-check"></i> Advanced Analytics</li>
                    <li><i class="fas fa-check"></i> Priority Support</li>
                    <li><i class="fas fa-check"></i> 365 Days Access</li>
                </ul>
                <a href="#" class="btn btn-outline btn-full">Get Started</a>
            </div>
        </div>
    </div>
</section>

<!-- Premium Features Detail -->
<section class="premium-features-section">
    <div class="container">
        <div class="section-header">
            <h2>Premium Features Explained</h2>
        </div>

        <div class="premium-features-grid">
            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-crystal-ball"></i></div>
                <h3>Early Predictions</h3>
                <p>Get our expert predictions before results are declared. Based on advanced algorithms and historical pattern analysis.</p>
            </div>

            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-chart-bar"></i></div>
                <h3>Advanced Analytics</h3>
                <p>Deep dive into result patterns, frequency analysis, hot and cold numbers, and trend predictions.</p>
            </div>

            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-sms"></i></div>
                <h3>SMS Notifications</h3>
                <p>Receive instant SMS alerts when results are declared. Never miss a result even without internet.</p>
            </div>

            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-envelope"></i></div>
                <h3>Email Alerts</h3>
                <p>Get detailed email reports with predictions, results, and analytics delivered to your inbox.</p>
            </div>

            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-ban"></i></div>
                <h3>Ad-Free Experience</h3>
                <p>Enjoy a clean, distraction-free interface without any advertisements or popups.</p>
            </div>

            <div class="premium-feature-card">
                <div class="pf-icon"><i class="fas fa-headset"></i></div>
                <h3>Priority Support</h3>
                <p>Get faster response times and dedicated support from our team for any queries.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="premium-faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Premium FAQ</h2>
        </div>

        <div class="faq-accordion">
            <div class="faq-item">
                <button class="faq-question">
                    How do I subscribe to Premium?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>You can subscribe to Premium by clicking on any "Get Started" button above. You'll be redirected to our secure payment page where you can complete your subscription using UPI, cards, or net banking.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    What payment methods are accepted?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We accept UPI (Google Pay, PhonePe, Paytm), credit/debit cards, net banking, and popular wallets. All payments are processed securely through our payment partner.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Can I cancel my subscription?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, you can cancel your subscription at any time. Your premium access will continue until the end of your current billing period. Refunds are processed according to our refund policy.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    How accurate are the predictions?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Our predictions are based on advanced algorithms and historical analysis. While we strive for accuracy, Teer is a game of chance and we cannot guarantee results. Predictions should be used for informational purposes only.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Is my payment information secure?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, absolutely. We use industry-standard SSL encryption and our payment processing is handled by trusted partners. We never store your card details on our servers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="premium-final-cta">
    <div class="container">
        <div class="final-cta-content">
            <h2>Ready to Go Premium?</h2>
            <p>Join thousands of satisfied premium users today!</p>
            <a href="#" class="btn btn-premium btn-large">
                <i class="fas fa-crown"></i> Subscribe Now
            </a>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;
            const isActive = faqItem.classList.contains('active');

            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    });
</script>
@endsection
