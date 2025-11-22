<?php
/**
 * GitHub Webhook Auto-Deploy Script
 *
 * Place this file in public_html/webhook.php
 * Set your GitHub webhook URL to: https://teerkhelaresults.com/webhook.php
 *
 * IMPORTANT: Change the secret key below!
 */

// Your secret key (set same in GitHub webhook settings)
$secret = 'your-webhook-secret-key-change-this';

// Verify GitHub signature
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
$payload = file_get_contents('php://input');

if (!$signature) {
    http_response_code(401);
    die('No signature');
}

$hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
if (!hash_equals($hash, $signature)) {
    http_response_code(401);
    die('Invalid signature');
}

// Log the deployment
$log = date('Y-m-d H:i:s') . " - Deployment triggered\n";
file_put_contents(__DIR__ . '/storage/logs/deploy.log', $log, FILE_APPEND);

// Execute deployment
$output = [];
$return = 0;

// Pull latest changes
exec('cd ' . __DIR__ . ' && git pull origin main 2>&1', $output, $return);

// Run composer
exec('cd ' . __DIR__ . ' && composer install --no-dev --optimize-autoloader 2>&1', $output, $return);

// Clear caches
exec('cd ' . __DIR__ . ' && php artisan config:cache 2>&1', $output, $return);
exec('cd ' . __DIR__ . ' && php artisan route:cache 2>&1', $output, $return);
exec('cd ' . __DIR__ . ' && php artisan view:cache 2>&1', $output, $return);
exec('cd ' . __DIR__ . ' && php artisan cache:clear 2>&1', $output, $return);

// Run migrations
exec('cd ' . __DIR__ . ' && php artisan migrate --force 2>&1', $output, $return);

// Log output
$log = date('Y-m-d H:i:s') . " - Output:\n" . implode("\n", $output) . "\n\n";
file_put_contents(__DIR__ . '/storage/logs/deploy.log', $log, FILE_APPEND);

echo "Deployed successfully!";
