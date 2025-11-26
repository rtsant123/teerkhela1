<?php
/**
 * Configuration file for Teer Khela Results
 */

// API Configuration
define('API_BASE_URL', 'https://teerkhela-production.up.railway.app/api');

// Site Configuration
define('SITE_NAME', 'Teer Khela Results');
define('SITE_URL', 'https://teerkhelaresults.com');
define('SUPPORT_EMAIL', 'support@teerkhelaresults.com');
define('WHATSAPP_NUMBER', '919876543210');

// Games Configuration
$GAMES = [
    'bhutan-teer' => [
        'name' => 'Bhutan Teer',
        'slug' => 'bhutan-teer',
        'icon' => 'bhutan',
        'color' => '#FF6B6B',
        'timing' => '3:30 PM & 4:30 PM',
        'description' => 'Bhutan Teer is a popular archery-based lottery game from Bhutan with two rounds daily.',
    ],
    'juwai-teer' => [
        'name' => 'Juwai Teer',
        'slug' => 'juwai-teer',
        'icon' => 'juwai',
        'color' => '#4ECDC4',
        'timing' => '1:45 PM & 2:30 PM',
        'description' => 'Juwai Teer is conducted in the scenic town of Juwai in Meghalaya with exciting archery rounds.',
    ],
    'khanapara-teer' => [
        'name' => 'Khanapara Teer',
        'slug' => 'khanapara-teer',
        'icon' => 'khanapara',
        'color' => '#45B7D1',
        'timing' => '4:00 PM & 4:45 PM',
        'description' => 'Khanapara Teer is one of the oldest and most popular Teer games in Northeast India.',
    ],
    'shillong-night' => [
        'name' => 'Shillong Night',
        'slug' => 'shillong-night',
        'icon' => 'shillong-night',
        'color' => '#96CEB4',
        'timing' => '8:00 PM & 9:00 PM',
        'description' => 'Shillong Night Teer offers evening entertainment with archery-based lottery excitement.',
    ],
    'shillong-teer' => [
        'name' => 'Shillong Teer',
        'slug' => 'shillong-teer',
        'icon' => 'shillong',
        'color' => '#667EEA',
        'timing' => '3:45 PM & 4:45 PM',
        'description' => 'Shillong Teer is the most famous Teer game organized by the Khasi Hills Archery Sports Association.',
    ],
];

// FAQs
$FAQS = [
    [
        'question' => 'What is Teer?',
        'answer' => 'Teer is a traditional archery-based lottery game popular in Northeast India, particularly in Meghalaya. Archers shoot arrows at a target, and the last two digits of the total arrows hitting the target become the winning number.',
    ],
    [
        'question' => 'How are Teer results calculated?',
        'answer' => 'In each round, archers shoot a specific number of arrows at a target. The total number of arrows that hit the target is counted, and the last two digits of this total become the result. For example, if 1,247 arrows hit the target, the result is 47.',
    ],
    [
        'question' => 'What is FR and SR?',
        'answer' => 'FR stands for "First Round" and SR stands for "Second Round". Each Teer game typically has two rounds of shooting per day, hence two results.',
    ],
    [
        'question' => 'When are Teer results declared?',
        'answer' => 'Results are typically declared in the afternoon and evening, depending on the game. Shillong Teer results come around 3:45 PM and 4:45 PM, while Shillong Night results come around 8:00 PM and 9:00 PM.',
    ],
    [
        'question' => 'How can I get early predictions?',
        'answer' => 'Our premium subscription offers early predictions based on advanced analytics, historical patterns, and expert analysis. Subscribe to our premium service to access these features.',
    ],
    [
        'question' => 'Is Teer legal?',
        'answer' => 'Yes, Teer is legal in Meghalaya and is regulated by the Meghalaya Amusements and Betting Tax Act. It is conducted under the supervision of the Khasi Hills Archery Sports Association.',
    ],
    [
        'question' => 'How accurate are the results on this website?',
        'answer' => 'We fetch results directly from official sources and update them in real-time. Our results are highly accurate and updated within minutes of official declaration.',
    ],
    [
        'question' => 'How can I contact support?',
        'answer' => 'You can reach us through the contact form on this page, via WhatsApp, or by email. We typically respond within 24 hours.',
    ],
];
