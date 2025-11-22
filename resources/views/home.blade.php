@extends('layouts.app')

@section('title', 'Teer Khela Results - Live Teer Results & Predictions')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Live Teer Results</h1>
            <p class="hero-tagline">Live Updates &bull; Real-time Results &bull; Accurate Predictions</p>
            <p class="hero-description">Get instant access to all major Teer game results including Shillong Teer, Khanapara Teer, Juwai Teer, and more!</p>
            <div class="hero-buttons">
                <a href="{{ route('download') }}" class="btn btn-primary btn-large">
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
            <h2>Today's Results</h2>
            <p>Latest Teer results updated in real-time</p>
        </div>

        <div class="results-grid">
            @foreach($games as $slug => $game)
            <div class="result-card" style="--card-color: {{ $game['color'] }}">
                <div class="card-header">
                    <div class="game-icon" style="background: {{ $game['color'] }}">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="game-info">
                        <h3>{{ $game['name'] }}</h3>
                        <span class="game-timing"><i class="far fa-clock"></i> {{ $game['timing'] }}</span>
                    </div>
                </div>

                <div class="card-body">
                    @if(isset($results[$slug]) && $results[$slug])
                        <div class="result-display">
                            <div class="result-item">
                                <span class="result-label">First Round (FR)</span>
                                <span class="result-number" style="background: {{ $game['color'] }}">
                                    {{ $results[$slug]['fr'] ?? '--' }}
                                </span>
                            </div>
                            <div class="result-item">
                                <span class="result-label">Second Round (SR)</span>
                                <span class="result-number" style="background: {{ $game['color'] }}">
                                    {{ $results[$slug]['sr'] ?? '--' }}
                                </span>
                            </div>
                        </div>
                        <p class="result-date">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($results[$slug]['date'])->format('d M Y') }}
                        </p>
                    @else
                        <div class="result-display">
                            <div class="result-item">
                                <span class="result-label">First Round (FR)</span>
                                <span class="result-number waiting">--</span>
                            </div>
                            <div class="result-item">
                                <span class="result-label">Second Round (SR)</span>
                                <span class="result-number waiting">--</span>
                            </div>
                        </div>
                        <p class="result-waiting"><i class="fas fa-spinner fa-spin"></i> Waiting for results...</p>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('game.results', $slug) }}" class="btn btn-outline">
                        View History <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
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
                <a href="{{ route('premium') }}" class="btn btn-premium btn-large">
                    <i class="fas fa-crown"></i> Explore Premium
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
@if(count($testimonials) > 0)
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <h2>What Our Users Say</h2>
            <p>Real testimonials from our satisfied users</p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">
                        @if($testimonial->image_url)
                            <img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
                        @else
                            <i class="fas fa-user"></i>
                        @endif
                    </div>
                    <div class="testimonial-info">
                        <h4>{{ $testimonial->name }}</h4>
                        @if($testimonial->amount)
                            <span class="testimonial-amount">Won {{ $testimonial->amount }}</span>
                        @endif
                    </div>
                </div>
                <div class="testimonial-stars">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'active' : '' }}"></i>
                    @endfor
                </div>
                <p class="testimonial-quote">"{{ $testimonial->quote }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Download CTA Section -->
<section class="download-cta-section">
    <div class="container">
        <div class="download-cta-content">
            <div class="download-cta-text">
                <h2>Download Our App</h2>
                <p>Get instant notifications and access results on the go!</p>
            </div>
            <div class="download-cta-buttons">
                <a href="{{ route('download') }}" class="btn btn-download">
                    <i class="fab fa-android"></i> Android App
                </a>
                <a href="#" class="btn btn-download btn-ios">
                    <i class="fab fa-apple"></i> iOS App
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Auto-refresh results every 60 seconds
    setInterval(() => {
        const cards = document.querySelectorAll('.result-waiting');
        if (cards.length > 0) {
            location.reload();
        }
    }, 60000);
</script>
@endsection
