<?php
/**
 * 404 Page - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Set 404 header
http_response_code(404);

// Page configuration
$pageTitle = '404 - Page Not Found - Teer Khela Results';

// Include header
include __DIR__ . '/includes/header.php';
?>

<section class="error-page">
    <div class="container">
        <div class="error-content">
            <div class="error-code">404</div>
            <h1>Page Not Found</h1>
            <p>Sorry, the page you're looking for doesn't exist.</p>
            <div class="error-actions">
                <a href="/" class="btn btn-primary btn-large">
                    <i class="fas fa-home"></i> Go Home
                </a>
                <a href="/support.php" class="btn btn-secondary btn-large">
                    <i class="fas fa-headset"></i> Contact Support
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.error-page {
    padding: 80px 0;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.error-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.error-code {
    font-size: 120px;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 20px;
}

.error-content h1 {
    font-size: 36px;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.error-content p {
    font-size: 18px;
    color: var(--text-muted);
    margin-bottom: 30px;
}

.error-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}
</style>

<?php
// Include footer
include __DIR__ . '/includes/footer.php';
?>
