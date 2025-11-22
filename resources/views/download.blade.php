@extends('layouts.app')

@section('title', 'Download App - Teer Khela Results')

@section('content')
<!-- Download Hero -->
<section class="download-hero">
    <div class="container">
        <div class="download-hero-content">
            <div class="download-hero-text">
                <h1>Download Teer Results App</h1>
                <p>Get instant notifications, live results, and more on your mobile device!</p>

                <div class="download-features">
                    <div class="download-feature">
                        <i class="fas fa-bell"></i>
                        <span>Instant Notifications</span>
                    </div>
                    <div class="download-feature">
                        <i class="fas fa-bolt"></i>
                        <span>Real-time Results</span>
                    </div>
                    <div class="download-feature">
                        <i class="fas fa-chart-line"></i>
                        <span>Live Statistics</span>
                    </div>
                    <div class="download-feature">
                        <i class="fas fa-moon"></i>
                        <span>Dark Mode</span>
                    </div>
                </div>

                <div class="download-buttons">
                    <a href="{{ $downloadLink }}" class="download-btn android">
                        <i class="fab fa-android"></i>
                        <div>
                            <span class="small">Download</span>
                            <span class="big">Android APK</span>
                        </div>
                    </a>

                    <a href="{{ $playStoreLink }}" class="download-btn playstore">
                        <i class="fab fa-google-play"></i>
                        <div>
                            <span class="small">Get it on</span>
                            <span class="big">Google Play</span>
                        </div>
                    </a>

                    <a href="{{ $appStoreLink }}" class="download-btn appstore">
                        <i class="fab fa-apple"></i>
                        <div>
                            <span class="small">Download on</span>
                            <span class="big">App Store</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="download-hero-image">
                <div class="phone-mockup">
                    <div class="phone-screen">
                        <div class="app-preview">
                            <div class="app-header">
                                <i class="fas fa-bullseye"></i> Teer Results
                            </div>
                            <div class="app-result-preview">
                                <div class="preview-game">Shillong Teer</div>
                                <div class="preview-numbers">
                                    <span>FR: 47</span>
                                    <span>SR: 82</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- App Features -->
<section class="app-features-section">
    <div class="container">
        <div class="section-header">
            <h2>App Features</h2>
            <p>Everything you need in one app</p>
        </div>

        <div class="app-features-grid">
            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-bell"></i></div>
                <h3>Push Notifications</h3>
                <p>Get instant alerts the moment results are declared. Never miss a result again!</p>
            </div>

            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-history"></i></div>
                <h3>Result History</h3>
                <p>Access 30+ days of result history for all games right from your phone.</p>
            </div>

            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-chart-pie"></i></div>
                <h3>Analytics</h3>
                <p>View detailed statistics, trends, and patterns for each game.</p>
            </div>

            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-wifi"></i></div>
                <h3>Offline Access</h3>
                <p>View previously loaded results even without internet connection.</p>
            </div>

            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-moon"></i></div>
                <h3>Dark Mode</h3>
                <p>Easy on the eyes with our beautiful dark mode theme.</p>
            </div>

            <div class="app-feature-card">
                <div class="af-icon"><i class="fas fa-language"></i></div>
                <h3>Multi-language</h3>
                <p>Available in English, Hindi, and regional languages.</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Install -->
<section class="install-guide-section">
    <div class="container">
        <div class="section-header">
            <h2>How to Install APK</h2>
            <p>Follow these simple steps to install the app</p>
        </div>

        <div class="install-steps">
            <div class="install-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Download APK</h3>
                    <p>Click the "Download Android APK" button above to download the installation file.</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Enable Unknown Sources</h3>
                    <p>Go to Settings > Security > Enable "Install from Unknown Sources"</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Install App</h3>
                    <p>Open the downloaded APK file and tap "Install" to complete installation.</p>
                </div>
            </div>

            <div class="install-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Open & Enjoy</h3>
                    <p>Open the app and start getting live Teer results on your phone!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download CTA -->
<section class="download-final-cta">
    <div class="container">
        <div class="final-cta-box">
            <h2>Ready to Download?</h2>
            <p>Get the best Teer results experience on your mobile device</p>
            <a href="{{ $downloadLink }}" class="btn btn-primary btn-large">
                <i class="fas fa-download"></i> Download Now
            </a>
        </div>
    </div>
</section>
@endsection
