<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 * Redirect to public folder for shared hosting
 */

// Go to public folder
chdir(__DIR__ . '/public');

// Load the Laravel application
require __DIR__ . '/public/index.php';
