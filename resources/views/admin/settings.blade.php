@extends('admin.layout')

@section('title', 'Settings')

@section('content')
<div class="page-header">
    <div>
        <h1>Settings</h1>
        <p>Configure site settings and preferences</p>
    </div>
</div>

<div class="settings-grid">
    <!-- General Settings -->
    <div class="form-card">
        <h3 class="form-section-title"><i class="fas fa-cog"></i> General Settings</h3>
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="app_name">Site Name</label>
                <input type="text" id="app_name" name="app_name" value="{{ $settings['app_name'] }}">
            </div>

            <div class="form-group">
                <label for="site_tagline">Site Tagline</label>
                <input type="text" id="site_tagline" name="site_tagline" value="{{ $settings['site_tagline'] }}">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" id="contact_email" name="contact_email" value="{{ $settings['contact_email'] }}">
            </div>

            <div class="form-group">
                <label for="whatsapp_number">WhatsApp Number</label>
                <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ $settings['whatsapp_number'] }}" placeholder="+919876543210">
            </div>

            <div class="form-group">
                <label for="analytics_code">Analytics Tracking Code</label>
                <textarea id="analytics_code" name="analytics_code" rows="3" placeholder="Paste your Google Analytics or other tracking code here">{{ $settings['analytics_code'] }}</textarea>
            </div>

            <h4>Feature Toggles</h4>

            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="enable_testimonials" value="1" {{ $settings['enable_testimonials'] ? 'checked' : '' }}>
                    <span>Show Testimonials on Homepage</span>
                </label>
            </div>

            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="enable_premium" value="1" {{ $settings['enable_premium'] ? 'checked' : '' }}>
                    <span>Enable Premium Features</span>
                </label>
            </div>

            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="enable_popups" value="1" {{ $settings['enable_popups'] ? 'checked' : '' }}>
                    <span>Enable Popups</span>
                </label>
            </div>

            <div class="form-group">
                <label class="checkbox-label warning">
                    <input type="checkbox" name="maintenance_mode" value="1" {{ $settings['maintenance_mode'] ? 'checked' : '' }}>
                    <span>Maintenance Mode (site will be offline)</span>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Change Password -->
    <div class="form-card">
        <h3 class="form-section-title"><i class="fas fa-lock"></i> Change Password</h3>
        <form action="{{ route('admin.settings.password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
                @error('current_password')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required minlength="8">
                @error('new_password')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-key"></i> Change Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
