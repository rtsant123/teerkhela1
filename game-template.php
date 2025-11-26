<?php
/**
 * Game Results Template - Teer Khela Results
 * This template is used by individual game pages
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/functions.php';

// Validate game slug (should be set by the including file)
if (!isset($gameSlug) || !isset($GAMES[$gameSlug])) {
    header('HTTP/1.0 404 Not Found');
    include __DIR__ . '/404.php';
    exit;
}

$game = $GAMES[$gameSlug];
$latestResult = getLatestResult($gameSlug);
$history = getResultHistory($gameSlug, 30);
$statistics = calculateStatistics($history);

// Page configuration
$pageTitle = e($game['name']) . ' Results - Live Teer Results Today';

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- Game Hero -->
<section class="game-hero" style="background: linear-gradient(135deg, <?php echo $game['color']; ?>, <?php echo $game['color']; ?>dd);">
    <div class="container">
        <div class="game-hero-content">
            <div class="game-icon-large">
                <i class="fas fa-bullseye"></i>
            </div>
            <h1><?php echo e($game['name']); ?> Results</h1>
            <p class="game-description"><?php echo e($game['description']); ?></p>
            <div class="game-timing">
                <i class="far fa-clock"></i> Timing: <?php echo e($game['timing']); ?>
            </div>
        </div>
    </div>
</section>

<!-- Latest Result -->
<section class="latest-result-section">
    <div class="container">
        <div class="section-header">
            <h2>Latest Result - <?php echo e($game['name']); ?></h2>
            <p>Most recent result updated in real-time</p>
        </div>

        <div class="latest-result-card">
            <?php if ($latestResult): ?>
                <div class="result-info">
                    <div class="result-date-large">
                        <i class="far fa-calendar-alt"></i>
                        <?php echo isset($latestResult['date']) ? formatDate($latestResult['date']) : 'Today'; ?>
                    </div>
                </div>
                <div class="result-numbers-large">
                    <div class="result-number-item">
                        <span class="label">First Round (FR)</span>
                        <span class="number" style="background: <?php echo $game['color']; ?>">
                            <?php echo formatResult($latestResult['fr'] ?? null); ?>
                        </span>
                    </div>
                    <div class="result-number-item">
                        <span class="label">Second Round (SR)</span>
                        <span class="number" style="background: <?php echo $game['color']; ?>">
                            <?php echo formatResult($latestResult['sr'] ?? null); ?>
                        </span>
                    </div>
                </div>
            <?php else: ?>
                <div class="no-result">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Waiting for today's result...</p>
                    <small>Results will be updated as soon as they are declared</small>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="statistics-section">
    <div class="container">
        <div class="section-header">
            <h2>Statistics & Analysis</h2>
            <p>Based on last 30 days of results</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="stat-value"><?php echo $statistics['total_results']; ?></div>
                <div class="stat-label">Total Results</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="stat-value"><?php echo $statistics['fr_average']; ?></div>
                <div class="stat-label">FR Average</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="stat-value"><?php echo $statistics['sr_average']; ?></div>
                <div class="stat-label">SR Average</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="stat-value"><?php echo formatResult($statistics['most_common_fr']); ?></div>
                <div class="stat-label">Most Common FR</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="stat-value"><?php echo formatResult($statistics['most_common_sr']); ?></div>
                <div class="stat-label">Most Common SR</div>
            </div>
        </div>
    </div>
</section>

<!-- Result History -->
<section class="history-section">
    <div class="container">
        <div class="section-header">
            <h2>Complete Result History</h2>
            <p>Last 30 days of <?php echo e($game['name']); ?> results</p>
        </div>

        <?php if (!empty($history)): ?>
        <div class="history-table-container">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>First Round (FR)</th>
                        <th>Second Round (SR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $result): ?>
                    <tr>
                        <td class="date-col">
                            <i class="far fa-calendar-alt"></i>
                            <?php echo formatDate($result['date']); ?>
                        </td>
                        <td>
                            <span class="history-number" style="background: <?php echo $game['color']; ?>">
                                <?php echo formatResult($result['fr'] ?? null); ?>
                            </span>
                        </td>
                        <td>
                            <span class="history-number" style="background: <?php echo $game['color']; ?>">
                                <?php echo formatResult($result['sr'] ?? null); ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="no-history">
            <i class="fas fa-inbox"></i>
            <p>No historical data available yet.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Other Games -->
<section class="other-games-section">
    <div class="container">
        <div class="section-header">
            <h2>Other Teer Games</h2>
            <p>Check results for other popular games</p>
        </div>

        <div class="games-list">
            <?php foreach ($GAMES as $slug => $otherGame):
                if ($slug === $gameSlug) continue;
            ?>
            <a href="/<?php echo $slug; ?>" class="game-link">
                <div class="game-link-icon" style="background: <?php echo $otherGame['color']; ?>">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="game-link-info">
                    <h4><?php echo e($otherGame['name']); ?></h4>
                    <p><i class="far fa-clock"></i> <?php echo e($otherGame['timing']); ?></p>
                </div>
                <i class="fas fa-arrow-right"></i>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
// Auto-refresh script
$extraScripts = "
<script>
    // Auto-refresh every 60 seconds
    setInterval(() => {
        location.reload();
    }, 60000);
</script>
";

// Include footer
include __DIR__ . '/includes/footer.php';
?>
