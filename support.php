<?php
/**
 * Support & FAQ Page - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Page configuration
$pageTitle = 'Support & FAQ - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Support Hero -->
<section class="page-hero">
    <div class="container">
        <h1><i class="fas fa-headset"></i> Support & FAQ</h1>
        <p>Get help and find answers to common questions</p>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to the most common questions</p>
        </div>

        <div class="faq-list">
            <?php foreach ($FAQS as $index => $faq): ?>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(<?php echo $index; ?>)">
                    <h3><?php echo e($faq['question']); ?></h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer" id="faq-<?php echo $index; ?>">
                    <p><?php echo e($faq['answer']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Can't find what you're looking for? Get in touch!</p>
        </div>

        <div class="contact-grid">
            <div class="contact-method">
                <div class="contact-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3>WhatsApp</h3>
                <p>Chat with us instantly</p>
                <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" class="btn btn-primary" target="_blank">
                    Open WhatsApp
                </a>
            </div>

            <div class="contact-method">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email</h3>
                <p>Get a response within 24 hours</p>
                <a href="mailto:<?php echo SUPPORT_EMAIL; ?>" class="btn btn-primary">
                    Send Email
                </a>
            </div>

            <div class="contact-method">
                <div class="contact-icon">
                    <i class="fab fa-telegram"></i>
                </div>
                <h3>Telegram</h3>
                <p>Join our Telegram channel</p>
                <a href="#" class="btn btn-primary" target="_blank">
                    Join Channel
                </a>
            </div>
        </div>
    </div>
</section>

<?php
// FAQ Toggle Script
$extraScripts = "
<script>
    function toggleFaq(index) {
        const answer = document.getElementById('faq-' + index);
        const allAnswers = document.querySelectorAll('.faq-answer');
        const allQuestions = document.querySelectorAll('.faq-question');

        // Close all other FAQs
        allAnswers.forEach((item, i) => {
            if (i !== index) {
                item.classList.remove('active');
                allQuestions[i].classList.remove('active');
            }
        });

        // Toggle current FAQ
        answer.classList.toggle('active');
        allQuestions[index].classList.toggle('active');
    }
</script>
";

// Include footer
include __DIR__ . '/includes/footer.php';
?>
