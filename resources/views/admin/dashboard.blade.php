@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>Dashboard</h1>
    <p>Welcome back! Here's an overview of your site.</p>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon testimonials"><i class="fas fa-comments"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $stats['testimonials'] }}</span>
            <span class="stat-label">Testimonials</span>
            <span class="stat-sub">{{ $stats['testimonials_visible'] }} visible</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon banners"><i class="fas fa-image"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $stats['banners'] }}</span>
            <span class="stat-label">Banners</span>
            <span class="stat-sub">{{ $stats['banners_visible'] }} visible</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon popups"><i class="fas fa-window-restore"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $stats['popups'] }}</span>
            <span class="stat-label">Popups</span>
            <span class="stat-sub">{{ $stats['popups_active'] }} active</span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon submissions"><i class="fas fa-envelope"></i></div>
        <div class="stat-info">
            <span class="stat-value">{{ $stats['submissions'] }}</span>
            <span class="stat-label">Submissions</span>
            <span class="stat-sub">{{ $stats['submissions_unread'] }} unread</span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="dashboard-section">
    <h2>Quick Actions</h2>
    <div class="quick-actions">
        <a href="{{ route('admin.testimonials.create') }}" class="quick-action">
            <i class="fas fa-plus"></i> Add Testimonial
        </a>
        <a href="{{ route('admin.banners.create') }}" class="quick-action">
            <i class="fas fa-plus"></i> Add Banner
        </a>
        <a href="{{ route('admin.popups.create') }}" class="quick-action">
            <i class="fas fa-plus"></i> Create Popup
        </a>
        <a href="{{ route('admin.links') }}" class="quick-action">
            <i class="fas fa-link"></i> Manage Links
        </a>
    </div>
</div>

<!-- Popup Performance -->
@if(count($popupStats) > 0)
<div class="dashboard-section">
    <h2>Popup Performance</h2>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Popup</th>
                    <th>Impressions</th>
                    <th>Clicks</th>
                    <th>CTR</th>
                </tr>
            </thead>
            <tbody>
                @foreach($popupStats as $popup)
                <tr>
                    <td>{{ $popup->title }}</td>
                    <td>{{ number_format($popup->impressions) }}</td>
                    <td>{{ number_format($popup->clicks) }}</td>
                    <td>
                        @if($popup->impressions > 0)
                            {{ round(($popup->clicks / $popup->impressions) * 100, 2) }}%
                        @else
                            0%
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<!-- Recent Submissions -->
@if(count($recentSubmissions) > 0)
<div class="dashboard-section">
    <div class="section-header-row">
        <h2>Recent Submissions</h2>
        <a href="{{ route('admin.submissions') }}" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="submissions-list">
        @foreach($recentSubmissions as $submission)
        <div class="submission-item {{ !$submission->is_read ? 'unread' : '' }}">
            <div class="submission-info">
                <span class="submission-name">{{ $submission->name }}</span>
                <span class="submission-subject">{{ $submission->subject }}</span>
            </div>
            <div class="submission-meta">
                <span class="submission-time">{{ $submission->created_at->diffForHumans() }}</span>
                <a href="{{ route('admin.submissions.view', $submission->id) }}" class="btn-view">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
