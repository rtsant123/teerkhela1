<?php
/**
 * Terms & Conditions - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Terms & Conditions - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<section class="legal-page">
    <div class="container">
        <div class="legal-content">
            <h1>Terms and Conditions</h1>
            <p class="last-updated">Last Updated: <?php echo date('F d, Y'); ?></p>

            <div class="legal-section">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using Teer Khela Results ("the Website"), you accept and agree to be bound by the terms and provisions of this agreement. If you do not agree to these terms, please do not use our website.</p>
            </div>

            <div class="legal-section">
                <h2>2. Description of Service</h2>
                <p>Teer Khela Results provides information about Teer lottery results from various games in Northeast India. Our services include:</p>
                <ul>
                    <li>Live Teer results from official sources</li>
                    <li>Historical result data</li>
                    <li>Statistical analysis and patterns</li>
                    <li>Premium subscription services with additional features</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>3. Disclaimer</h2>
                <p><strong>Important:</strong> Teer Khela Results is an informational website only. We do not organize, conduct, or facilitate any lottery or gambling activities. The results displayed on our website are sourced from official channels for informational purposes.</p>
                <p>Users should verify all results from official sources before making any decisions. We are not responsible for any actions taken based on the information provided on this website.</p>
            </div>

            <div class="legal-section">
                <h2>4. User Responsibilities</h2>
                <p>By using this website, you agree to:</p>
                <ul>
                    <li>Use the website only for lawful purposes</li>
                    <li>Not engage in any activity that disrupts the website</li>
                    <li>Not attempt to access unauthorized areas of the website</li>
                    <li>Comply with all applicable local laws regarding lottery and gambling</li>
                    <li>Provide accurate information when creating an account or subscribing</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>5. Intellectual Property</h2>
                <p>All content on this website, including text, graphics, logos, and software, is the property of Teer Khela Results and is protected by copyright laws. You may not reproduce, distribute, or create derivative works without our written permission.</p>
            </div>

            <div class="legal-section">
                <h2>6. Premium Subscriptions</h2>
                <p>Premium subscriptions are subject to the following terms:</p>
                <ul>
                    <li>Subscriptions are charged in advance on a recurring basis</li>
                    <li>You can cancel your subscription at any time</li>
                    <li>Refunds are provided according to our refund policy</li>
                    <li>Premium features are subject to change</li>
                    <li>We reserve the right to modify pricing with notice</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>7. Limitation of Liability</h2>
                <p>Teer Khela Results and its affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from:</p>
                <ul>
                    <li>Your use or inability to use the service</li>
                    <li>Any errors or omissions in the content</li>
                    <li>Any unauthorized access to or use of our servers</li>
                    <li>Any interruption or cessation of transmission</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>8. Changes to Terms</h2>
                <p>We reserve the right to modify these terms at any time. We will notify users of any material changes by posting the new terms on this page. Your continued use of the website after such modifications constitutes acceptance of the updated terms.</p>
            </div>

            <div class="legal-section">
                <h2>9. Governing Law</h2>
                <p>These terms shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law provisions.</p>
            </div>

            <div class="legal-section">
                <h2>10. Contact Us</h2>
                <p>If you have any questions about these Terms and Conditions, please contact us at:</p>
                <p>Email: <?php echo SUPPORT_EMAIL; ?></p>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
