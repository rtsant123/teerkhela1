<?php
/**
 * Homepage - Teer Khela Results
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Get data
$results = getAllLatestResults();

// Page configuration
$pageTitle = 'Teer Khela Results - Live Teer Results & Predictions';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Live Teer Results</h1>
            <p class="hero-tagline">Live Updates &bull; Real-time Results &bull; Accurate Predictions</p>
            <p class="hero-description">Get instant access to all major Teer game results including Shillong Teer, Khanapara Teer, Juwai Teer, and more!</p>
            <div class="hero-buttons">
                <a href="/download.php" class="btn btn-primary btn-large">
                    <i class="fas fa-download"></i> Download App
                </a>
                <a href="#results" class="btn btn-secondary btn-large">
                    <i class="fas fa-chart-line"></i> View Results
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="results-section" id="results">
    <div class="container">
        <div class="section-header">
            <h2>Today's Live Teer Results</h2>
            <p>Updated in real-time • <?php echo date('d F Y'); ?></p>
        </div>

        <!-- Results Table -->
        <div class="results-table-wrapper">
            <table class="results-table">
                <thead>
                    <tr>
                        <th>Teer Game</th>
                        <th>Timing</th>
                        <th>FR (First Round)</th>
                        <th>SR (Second Round)</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($GAMES as $slug => $game):
                        $result = $results[$slug] ?? null;
                    ?>
                    <tr class="result-row">
                        <td class="game-name-col">
                            <div class="game-name-wrapper">
                                <div class="game-icon-small" style="background: <?php echo $game['color']; ?>">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <div class="game-name-info">
                                    <strong><?php echo e($game['name']); ?></strong>
                                </div>
                            </div>
                        </td>
                        <td class="timing-col">
                            <span class="timing-badge">
                                <i class="far fa-clock"></i>
                                <?php echo e($game['timing']); ?>
                            </span>
                        </td>
                        <td class="result-col">
                            <span class="result-badge fr-badge" style="background: <?php echo $game['color']; ?>">
                                <?php echo $result ? formatResult($result['fr'] ?? null) : '--'; ?>
                            </span>
                        </td>
                        <td class="result-col">
                            <span class="result-badge sr-badge" style="background: <?php echo $game['color']; ?>">
                                <?php echo $result ? formatResult($result['sr'] ?? null) : '--'; ?>
                            </span>
                        </td>
                        <td class="date-col">
                            <?php if ($result): ?>
                                <i class="far fa-calendar-alt"></i>
                                <?php echo isset($result['date']) ? formatDate($result['date']) : 'Today'; ?>
                            <?php else: ?>
                                <span class="waiting-text">
                                    <i class="fas fa-spinner fa-spin"></i> Pending
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="action-col">
                            <a href="/<?php echo $slug; ?>" class="view-details-btn">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View (Hidden on Desktop) -->
        <div class="mobile-results">
            <?php foreach ($GAMES as $slug => $game):
                $result = $results[$slug] ?? null;
            ?>
            <div class="mobile-result-card">
                <div class="mobile-card-header" style="border-left: 4px solid <?php echo $game['color']; ?>">
                    <div class="mobile-game-info">
                        <div class="game-icon-small" style="background: <?php echo $game['color']; ?>">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div>
                            <h3><?php echo e($game['name']); ?></h3>
                            <span class="mobile-timing">
                                <i class="far fa-clock"></i> <?php echo e($game['timing']); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mobile-card-body">
                    <div class="mobile-results-row">
                        <div class="mobile-result-item">
                            <span class="mobile-label">FR</span>
                            <span class="mobile-result-badge" style="background: <?php echo $game['color']; ?>">
                                <?php echo $result ? formatResult($result['fr'] ?? null) : '--'; ?>
                            </span>
                        </div>
                        <div class="mobile-result-item">
                            <span class="mobile-label">SR</span>
                            <span class="mobile-result-badge" style="background: <?php echo $game['color']; ?>">
                                <?php echo $result ? formatResult($result['sr'] ?? null) : '--'; ?>
                            </span>
                        </div>
                    </div>
                    <div class="mobile-card-footer">
                        <span class="mobile-date">
                            <?php if ($result): ?>
                                <i class="far fa-calendar-alt"></i>
                                <?php echo isset($result['date']) ? formatDate($result['date']) : 'Today'; ?>
                            <?php else: ?>
                                <i class="fas fa-spinner fa-spin"></i> Waiting...
                            <?php endif; ?>
                        </span>
                        <a href="/<?php echo $slug; ?>" class="mobile-view-btn" style="background: <?php echo $game['color']; ?>">
                            View Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="features-section">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Us?</h2>
            <p>The most trusted platform for Teer results</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Real-time Updates</h3>
                <p>Get results within seconds of official declaration. Our system automatically fetches and updates results in real-time.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>100% Accurate</h3>
                <p>We source our results directly from official channels ensuring complete accuracy. No guesswork, only verified data.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-history"></i>
                </div>
                <h3>Complete History</h3>
                <p>Access 30+ days of result history for all games. Analyze patterns and trends with our comprehensive database.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Mobile Friendly</h3>
                <p>Access results anywhere, anytime. Our mobile app and responsive website work perfectly on all devices.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Instant Notifications</h3>
                <p>Subscribe to push notifications and never miss a result. Get alerts the moment results are declared.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Our support team is always available to help. Reach us via WhatsApp, email, or through our contact form.</p>
            </div>
        </div>
    </div>
</section>

<!-- Premium Section -->
<section class="premium-cta-section">
    <div class="container">
        <div class="premium-cta-content">
            <div class="premium-cta-text">
                <h2><i class="fas fa-crown"></i> Go Premium</h2>
                <p>Unlock exclusive features including early predictions, advanced analytics, win alerts, and more!</p>
                <ul class="premium-benefits">
                    <li><i class="fas fa-check"></i> Early predictions before results</li>
                    <li><i class="fas fa-check"></i> Advanced number analytics</li>
                    <li><i class="fas fa-check"></i> SMS & Email notifications</li>
                    <li><i class="fas fa-check"></i> Ad-free experience</li>
                </ul>
            </div>
            <div class="premium-cta-action">
                <a href="/premium.php" class="btn btn-premium btn-large">
                    <i class="fas fa-crown"></i> Explore Premium
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Download CTA Section -->
<section class="download-cta-section">
    <div class="container">
        <div class="download-cta-content">
            <div class="download-cta-text">
                <h2>Download Our App</h2>
                <p>Get instant notifications and access results on the go!</p>
            </div>
            <div class="download-cta-buttons">
                <a href="/download.php" class="btn btn-download">
                    <i class="fab fa-android"></i> Android App
                </a>
                <a href="#" class="btn btn-download btn-ios">
                    <i class="fab fa-apple"></i> iOS App
                </a>
            </div>
        </div>
    </div>
</section>

<?php
// Auto-refresh script for pending results
$extraScripts = "
<script>
    // Auto-refresh results every 60 seconds if there are pending results
    setInterval(() => {
        const cards = document.querySelectorAll('.result-waiting');
        if (cards.length > 0) {
            location.reload();
        }
    }, 60000);
</script>
";

// Include footer
include __DIR__ . '/includes/footer.php';
?>
