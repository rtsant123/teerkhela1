<?php
/**
 * Privacy Policy - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Privacy Policy - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<section class="legal-page">
    <div class="container">
        <div class="legal-content">
            <h1>Privacy Policy</h1>
            <p class="last-updated">Last Updated: <?php echo date('F d, Y'); ?></p>

            <div class="legal-section">
                <h2>1. Introduction</h2>
                <p>Teer Khela Results ("we", "us", or "our") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.</p>
            </div>

            <div class="legal-section">
                <h2>2. Information We Collect</h2>
                <h3>2.1 Personal Information</h3>
                <p>We may collect personal information that you voluntarily provide, including:</p>
                <ul>
                    <li>Name and email address (when you contact us or subscribe)</li>
                    <li>Phone number (for SMS notifications)</li>
                    <li>Payment information (for premium subscriptions)</li>
                </ul>

                <h3>2.2 Automatically Collected Information</h3>
                <p>We automatically collect certain information when you visit our website:</p>
                <ul>
                    <li>IP address and browser type</li>
                    <li>Device information</li>
                    <li>Pages visited and time spent</li>
                    <li>Referring website</li>
                    <li>Cookies and similar tracking technologies</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>3. How We Use Your Information</h2>
                <p>We use the collected information to:</p>
                <ul>
                    <li>Provide and maintain our services</li>
                    <li>Send you result notifications (if subscribed)</li>
                    <li>Process premium subscription payments</li>
                    <li>Respond to your inquiries and support requests</li>
                    <li>Improve our website and services</li>
                    <li>Send promotional communications (with your consent)</li>
                    <li>Detect and prevent fraud or abuse</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>4. Information Sharing</h2>
                <p>We do not sell, trade, or rent your personal information to third parties. We may share your information with:</p>
                <ul>
                    <li><strong>Service Providers:</strong> Third-party vendors who perform services on our behalf (payment processing, email delivery)</li>
                    <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                    <li><strong>Business Transfers:</strong> In connection with a merger, sale, or acquisition</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>5. Cookies and Tracking Technologies</h2>
                <p>We use cookies and similar tracking technologies to enhance your experience. You can control cookies through your browser settings. Types of cookies we use:</p>
                <ul>
                    <li><strong>Essential Cookies:</strong> Required for the website to function</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how users interact with our site</li>
                    <li><strong>Preference Cookies:</strong> Remember your settings and preferences</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>6. Data Security</h2>
                <p>We implement appropriate technical and organizational measures to protect your personal information. However, no method of transmission over the Internet is 100% secure, and we cannot guarantee absolute security.</p>
            </div>

            <div class="legal-section">
                <h2>7. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Correct inaccurate data</li>
                    <li>Request deletion of your data</li>
                    <li>Opt-out of marketing communications</li>
                    <li>Withdraw consent for data processing</li>
                </ul>
            </div>

            <div class="legal-section">
                <h2>8. Data Retention</h2>
                <p>We retain your personal information only for as long as necessary to fulfill the purposes for which it was collected, comply with legal obligations, resolve disputes, and enforce our agreements.</p>
            </div>

            <div class="legal-section">
                <h2>9. Third-Party Links</h2>
                <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites. We encourage you to read their privacy policies.</p>
            </div>

            <div class="legal-section">
                <h2>10. Children's Privacy</h2>
                <p>Our services are not directed to individuals under the age of 18. We do not knowingly collect personal information from children.</p>
            </div>

            <div class="legal-section">
                <h2>11. Changes to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page with an updated "Last Updated" date.</p>
            </div>

            <div class="legal-section">
                <h2>12. Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us at:</p>
                <p>Email: <?php echo SUPPORT_EMAIL; ?></p>
                <p>WhatsApp: +<?php echo WHATSAPP_NUMBER; ?></p>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
