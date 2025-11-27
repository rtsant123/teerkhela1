<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get live Teer results, predictions, and analysis for Shillong Teer, Khanapara Teer, Juwai Teer, and more. Real-time updates and accurate results.">
    <meta name="keywords" content="teer results, shillong teer, khanapara teer, juwai teer, bhutan teer, teer prediction, live teer">
    <title><?php echo isset($pageTitle) ? e($pageTitle) : 'Teer Khela Results - Live Teer Results & Predictions'; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/public/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/css/style.css">

    <?php if (isset($extraHead)): ?>
    <?php echo $extraHead; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">
                    <i class="fas fa-bullseye"></i>
                    <span>Teer Results</span>
                </a>

                <nav class="nav-menu" id="navMenu">
                    <a href="/" class="<?php echo isActive('home'); ?>">Home</a>
                    <a href="/premium.php" class="<?php echo isActive('premium'); ?>">App Features</a>
                    <a href="/support.php" class="<?php echo isActive('support'); ?>">Support</a>
                    <a href="/download.php" class="nav-cta">
                        <i class="fas fa-download"></i> Download App
                    </a>
                </nav>

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
