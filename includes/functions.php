<?php
/**
 * Helper functions for Teer Khela Results
 */

/**
 * Fetch data from API with caching
 */
function fetchAPI($endpoint, $cacheTime = 120) {
    $cacheDir = __DIR__ . '/../cache';
    if (!file_exists($cacheDir)) {
        mkdir($cacheDir, 0755, true);
    }

    $cacheFile = $cacheDir . '/' . md5($endpoint) . '.json';

    // Check cache
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
        $data = file_get_contents($cacheFile);
        return json_decode($data, true);
    }

    // Fetch from API
    $url = API_BASE_URL . $endpoint;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $response) {
        file_put_contents($cacheFile, $response);
        return json_decode($response, true);
    }

    // Return cached data if API fails
    if (file_exists($cacheFile)) {
        $data = file_get_contents($cacheFile);
        return json_decode($data, true);
    }

    return null;
}

/**
 * Get latest result for a game
 */
function getLatestResult($gameSlug) {
    $result = fetchAPI("/results/{$gameSlug}/latest", 120);

    if ($result && isset($result['success']) && $result['success'] && isset($result['data'])) {
        return $result['data'];
    }

    return null;
}

/**
 * Get all latest results
 */
function getAllLatestResults() {
    global $GAMES;
    $results = [];

    foreach ($GAMES as $slug => $game) {
        $results[$slug] = getLatestResult($slug);
    }

    return $results;
}

/**
 * Get result history for a game
 */
function getResultHistory($gameSlug, $days = 30) {
    $result = fetchAPI("/results/{$gameSlug}/history?days={$days}", 86400); // Cache for 24 hours

    if ($result && isset($result['success']) && $result['success'] && isset($result['data'])) {
        return $result['data'];
    }

    return [];
}

/**
 * Calculate statistics from history
 */
function calculateStatistics($history) {
    if (empty($history)) {
        return [
            'total_results' => 0,
            'fr_average' => 0,
            'sr_average' => 0,
            'most_common_fr' => '-',
            'most_common_sr' => '-',
        ];
    }

    $frValues = array_filter(array_column($history, 'fr'), function($v) { return $v !== null; });
    $srValues = array_filter(array_column($history, 'sr'), function($v) { return $v !== null; });

    return [
        'total_results' => count($history),
        'fr_average' => count($frValues) ? round(array_sum($frValues) / count($frValues), 1) : 0,
        'sr_average' => count($srValues) ? round(array_sum($srValues) / count($srValues), 1) : 0,
        'most_common_fr' => getMostCommon($frValues),
        'most_common_sr' => getMostCommon($srValues),
    ];
}

/**
 * Get most common value
 */
function getMostCommon($values) {
    if (empty($values)) {
        return '-';
    }

    $counts = array_count_values($values);
    arsort($counts);
    return (string) array_key_first($counts);
}

/**
 * Format date
 */
function formatDate($dateString) {
    return date('d M Y', strtotime($dateString));
}

/**
 * Escape HTML
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Format result number with zero padding
 */
function formatResult($number) {
    if ($number === null || $number === '') {
        return '--';
    }
    return str_pad($number, 2, '0', STR_PAD_LEFT);
}

/**
 * Get current page
 */
function getCurrentPage() {
    $uri = $_SERVER['REQUEST_URI'];
    $path = parse_url($uri, PHP_URL_PATH);
    $path = trim($path, '/');

    if (empty($path)) {
        return 'home';
    }

    return $path;
}

/**
 * Check if route is active
 */
function isActive($route) {
    $current = getCurrentPage();
    return ($current === $route || strpos($current, $route) === 0) ? 'active' : '';
}
