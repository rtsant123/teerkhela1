<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Teer Khela Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    @yield('head')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                    <i class="fas fa-bullseye"></i>
                    <span>Teer Admin</span>
                </a>
                <button class="sidebar-close" id="sidebarClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('admin.testimonials') }}" class="{{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i> Testimonials
                </a>
                <a href="{{ route('admin.banners') }}" class="{{ request()->routeIs('admin.banners*') ? 'active' : '' }}">
                    <i class="fas fa-image"></i> Banners
                </a>
                <a href="{{ route('admin.popups') }}" class="{{ request()->routeIs('admin.popups*') ? 'active' : '' }}">
                    <i class="fas fa-window-restore"></i> Popups
                </a>
                <a href="{{ route('admin.links') }}" class="{{ request()->routeIs('admin.links') ? 'active' : '' }}">
                    <i class="fas fa-link"></i> Links
                </a>
                <a href="{{ route('admin.submissions') }}" class="{{ request()->routeIs('admin.submissions*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Submissions
                    @php $unreadCount = \App\Models\ContactSubmission::unread()->count(); @endphp
                    @if($unreadCount > 0)
                        <span class="badge">{{ $unreadCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-external-link-alt"></i> View Site
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Top Bar -->
            <header class="admin-topbar">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="topbar-right">
                    <span class="admin-user">
                        <i class="fas fa-user-circle"></i>
                        {{ Auth::guard('admin')->user()->email }}
                    </span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('adminSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        sidebarClose?.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // Auto-hide alerts
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, 5000);
        });
    </script>
    @yield('scripts')
</body>
</html>
