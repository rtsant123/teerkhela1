@extends('layouts.app')

@section('title', $game['name'] . ' Results - Teer Khela Results')

@section('content')
<!-- Game Header -->
<section class="game-header" style="--game-color: {{ $game['color'] }}">
    <div class="container">
        <div class="game-header-content">
            <div class="game-icon-large" style="background: {{ $game['color'] }}">
                <i class="fas fa-bullseye"></i>
            </div>
            <div class="game-header-info">
                <h1>{{ $game['name'] }}</h1>
                <p class="game-timing"><i class="far fa-clock"></i> Results at {{ $game['timing'] }}</p>
                <p class="game-description">{{ $game['description'] }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Result -->
<section class="latest-result-section">
    <div class="container">
        <div class="latest-result-card" style="--card-color: {{ $game['color'] }}">
            <div class="section-header">
                <h2>Latest Result</h2>
                @if($latestResult)
                    <span class="result-date-badge">
                        <i class="far fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($latestResult['date'])->format('d M Y') }}
                    </span>
                @endif
            </div>

            @if($latestResult)
                <div class="latest-result-display">
                    <div class="result-box">
                        <span class="result-label">First Round (FR)</span>
                        <span class="result-number-large" style="background: {{ $game['color'] }}">
                            {{ $latestResult['fr'] ?? '--' }}
                        </span>
                    </div>
                    <div class="result-divider">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="result-box">
                        <span class="result-label">Second Round (SR)</span>
                        <span class="result-number-large" style="background: {{ $game['color'] }}">
                            {{ $latestResult['sr'] ?? '--' }}
                        </span>
                    </div>
                </div>
            @else
                <div class="no-result-message">
                    <i class="fas fa-hourglass-half"></i>
                    <p>Results not available yet. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="statistics-section">
    <div class="container">
        <div class="section-header">
            <h2>Statistics (Last 30 Days)</h2>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $statistics['total_results'] }}</span>
                    <span class="stat-label">Total Results</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-calculator"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $statistics['fr_average'] }}</span>
                    <span class="stat-label">FR Average</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-calculator"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $statistics['sr_average'] }}</span>
                    <span class="stat-label">SR Average</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-star"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $statistics['most_common_fr'] }}</span>
                    <span class="stat-label">Most Common FR</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-star"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $statistics['most_common_sr'] }}</span>
                    <span class="stat-label">Most Common SR</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Results History -->
<section class="history-section">
    <div class="container">
        <div class="section-header">
            <h2>30-Day Result History</h2>
            <p>Complete results archive for {{ $game['name'] }}</p>
        </div>

        @if(count($history) > 0)
            <div class="history-table-wrapper">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>First Round (FR)</th>
                            <th>Second Round (SR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($history as $result)
                            <tr>
                                <td>
                                    <span class="history-date">
                                        {{ \Carbon\Carbon::parse($result['date'])->format('d M Y') }}
                                    </span>
                                    <span class="history-day">
                                        {{ \Carbon\Carbon::parse($result['date'])->format('l') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="history-number fr">{{ $result['fr'] ?? '--' }}</span>
                                </td>
                                <td>
                                    <span class="history-number sr">{{ $result['sr'] ?? '--' }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="no-history-message">
                <i class="fas fa-database"></i>
                <p>No historical data available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- Game Rules Section -->
<section class="rules-section">
    <div class="container">
        <div class="section-header">
            <h2>How to Play {{ $game['name'] }}</h2>
        </div>

        <div class="rules-content">
            <div class="rules-card">
                <h3><i class="fas fa-info-circle"></i> What is Teer?</h3>
                <p>Teer is a traditional archery-based lottery game that originated in Meghalaya, India. The game involves archers shooting arrows at a target, and the winning numbers are derived from the total arrows that hit the target.</p>
            </div>

            <div class="rules-card">
                <h3><i class="fas fa-bullseye"></i> How Results are Calculated</h3>
                <p>In each round, a group of archers shoot arrows at a cylindrical bamboo target. The total number of arrows that successfully hit the target is counted. The last two digits of this total become the winning number for that round.</p>
                <p><strong>Example:</strong> If 1,247 arrows hit the target, the result is <strong>47</strong>.</p>
            </div>

            <div class="rules-card">
                <h3><i class="far fa-clock"></i> Timing</h3>
                <p>{{ $game['name'] }} results are typically declared at <strong>{{ $game['timing'] }}</strong>. The first round (FR) result comes first, followed by the second round (SR) result.</p>
            </div>

            <div class="rules-card">
                <h3><i class="fas fa-exclamation-triangle"></i> Important Note</h3>
                <p>Teer is legal in Meghalaya and regulated by the state government. Please ensure you participate only through authorized channels and check local laws regarding lottery games in your area.</p>
            </div>
        </div>
    </div>
</section>

<!-- Other Games -->
<section class="other-games-section">
    <div class="container">
        <div class="section-header">
            <h2>Other Teer Games</h2>
        </div>

        <div class="other-games-grid">
            @foreach($allGames as $slug => $otherGame)
                @if($slug !== $gameSlug)
                    <a href="{{ route('game.results', $slug) }}" class="other-game-card" style="--card-color: {{ $otherGame['color'] }}">
                        <div class="other-game-icon" style="background: {{ $otherGame['color'] }}">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>{{ $otherGame['name'] }}</h4>
                        <span>{{ $otherGame['timing'] }}</span>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Premium CTA -->
<section class="game-premium-cta">
    <div class="container">
        <div class="premium-cta-box">
            <div class="premium-cta-icon">
                <i class="fas fa-crown"></i>
            </div>
            <div class="premium-cta-text">
                <h3>Want Early Predictions?</h3>
                <p>Subscribe to Premium and get predictions before results are declared!</p>
            </div>
            <a href="{{ route('premium') }}" class="btn btn-premium">
                Get Premium <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection
