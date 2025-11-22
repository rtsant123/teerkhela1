<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get live Teer results, predictions, and analysis for Shillong Teer, Khanapara Teer, Juwai Teer, and more. Real-time updates and accurate results.">
    <meta name="keywords" content="teer results, shillong teer, khanapara teer, juwai teer, bhutan teer, teer prediction, live teer">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Teer Khela Results - Live Teer Results & Predictions')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">

    @yield('head')
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="{{ route('home') }}" class="logo">
                    <i class="fas fa-bullseye"></i>
                    <span>Teer Results</span>
                </a>

                <nav class="nav-menu" id="navMenu">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('premium') }}" class="{{ request()->routeIs('premium') ? 'active' : '' }}">Premium</a>
                    <a href="{{ route('support') }}" class="{{ request()->routeIs('support') ? 'active' : '' }}">Support</a>
                    <a href="{{ route('download') }}" class="nav-cta">
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
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3><i class="fas fa-bullseye"></i> Teer Results</h3>
                    <p>Your trusted source for live Teer results, predictions, and analysis. Get accurate and real-time updates for all major Teer games.</p>
                    <div class="social-links">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('premium') }}">Premium Features</a></li>
                        <li><a href="{{ route('support') }}">Support & FAQ</a></li>
                        <li><a href="{{ route('download') }}">Download App</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Teer Games</h4>
                    <ul>
                        <li><a href="{{ route('game.results', 'shillong-teer') }}">Shillong Teer</a></li>
                        <li><a href="{{ route('game.results', 'khanapara-teer') }}">Khanapara Teer</a></li>
                        <li><a href="{{ route('game.results', 'juwai-teer') }}">Juwai Teer</a></li>
                        <li><a href="{{ route('game.results', 'shillong-night') }}">Shillong Night</a></li>
                        <li><a href="{{ route('game.results', 'bhutan-teer') }}">Bhutan Teer</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    </ul>
                    <h4 class="mt-3">Contact</h4>
                    <p><i class="fas fa-envelope"></i> support@teerkhelaresults.com</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Teer Khela Results. All rights reserved.</p>
                <p class="disclaimer">Disclaimer: This website is for informational purposes only. Please check local laws regarding lottery games.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/919876543210" target="_blank" class="whatsapp-btn">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Popup Modal -->
    @if(isset($popup) && $popup)
    <div class="popup-overlay" id="popupOverlay" data-popup-id="{{ $popup->id }}" data-delay="{{ $popup->delay_seconds }}">
        <div class="popup-content">
            <button class="popup-close" id="popupClose">&times;</button>
            @if($popup->image_url)
            <img src="{{ $popup->image_url }}" alt="{{ $popup->title }}" class="popup-image">
            @endif
            <h2>{{ $popup->title }}</h2>
            @if($popup->description)
            <p>{{ $popup->description }}</p>
            @endif
            @if($popup->button_link)
            <a href="{{ $popup->button_link }}" class="popup-btn" id="popupCta">{{ $popup->button_text ?? 'Learn More' }}</a>
            @endif
        </div>
    </div>
    @endif

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('active');
        });

        // Popup functionality
        const popupOverlay = document.getElementById('popupOverlay');
        if (popupOverlay) {
            const delay = parseInt(popupOverlay.dataset.delay) * 1000 || 3000;
            const popupId = popupOverlay.dataset.popupId;

            // Check if popup was already shown this session
            const popupShown = sessionStorage.getItem('popup_shown_' + popupId);

            if (!popupShown) {
                setTimeout(() => {
                    popupOverlay.classList.add('active');
                    // Track impression
                    fetch('/popup/impression', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ popup_id: popupId })
                    });
                    sessionStorage.setItem('popup_shown_' + popupId, '1');
                }, delay);
            }

            // Close popup
            document.getElementById('popupClose')?.addEventListener('click', () => {
                popupOverlay.classList.remove('active');
            });

            // Close on overlay click
            popupOverlay.addEventListener('click', (e) => {
                if (e.target === popupOverlay) {
                    popupOverlay.classList.remove('active');
                }
            });

            // Track CTA click
            document.getElementById('popupCta')?.addEventListener('click', () => {
                fetch('/popup/click', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ popup_id: popupId })
                });
            });
        }
    </script>

    @yield('scripts')
</body>
</html>
