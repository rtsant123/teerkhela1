@extends('admin.layout')

@section('title', 'Manage Links')

@section('content')
<div class="page-header">
    <div>
        <h1>Manage Links</h1>
        <p>Update app download links, social media, and contact information</p>
    </div>
</div>

<div class="form-card">
    <form action="{{ route('admin.links.update') }}" method="POST">
        @csrf
        @method('PUT')

        <h3 class="form-section-title"><i class="fas fa-download"></i> App Download Links</h3>

        <div class="form-group">
            <label for="app_download_link">Direct APK Download Link</label>
            <input type="url" id="app_download_link" name="app_download_link" value="{{ $links['app_download_link'] }}" placeholder="https://example.com/app.apk">
            @error('app_download_link')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="play_store_link">Google Play Store Link</label>
                <input type="url" id="play_store_link" name="play_store_link" value="{{ $links['play_store_link'] }}" placeholder="https://play.google.com/store/apps/...">
                @error('play_store_link')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="app_store_link">Apple App Store Link</label>
                <input type="url" id="app_store_link" name="app_store_link" value="{{ $links['app_store_link'] }}" placeholder="https://apps.apple.com/app/...">
                @error('app_store_link')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <h3 class="form-section-title"><i class="fas fa-phone"></i> Contact Links</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="whatsapp_link">WhatsApp Link</label>
                <input type="url" id="whatsapp_link" name="whatsapp_link" value="{{ $links['whatsapp_link'] }}" placeholder="https://wa.me/919876543210">
                <span class="form-hint">Format: https://wa.me/[country code][number]</span>
                @error('whatsapp_link')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="support_email">Support Email</label>
                <input type="email" id="support_email" name="support_email" value="{{ $links['support_email'] }}" placeholder="support@example.com">
                @error('support_email')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="premium_link">Premium Subscription Link</label>
            <input type="url" id="premium_link" name="premium_link" value="{{ $links['premium_link'] }}" placeholder="https://example.com/subscribe">
            @error('premium_link')<span class="error">{{ $message }}</span>@enderror
        </div>

        <h3 class="form-section-title"><i class="fas fa-share-alt"></i> Social Media Links</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="facebook_url"><i class="fab fa-facebook"></i> Facebook</label>
                <input type="url" id="facebook_url" name="facebook_url" value="{{ $links['facebook_url'] }}" placeholder="https://facebook.com/...">
            </div>

            <div class="form-group">
                <label for="twitter_url"><i class="fab fa-twitter"></i> Twitter</label>
                <input type="url" id="twitter_url" name="twitter_url" value="{{ $links['twitter_url'] }}" placeholder="https://twitter.com/...">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="instagram_url"><i class="fab fa-instagram"></i> Instagram</label>
                <input type="url" id="instagram_url" name="instagram_url" value="{{ $links['instagram_url'] }}" placeholder="https://instagram.com/...">
            </div>

            <div class="form-group">
                <label for="youtube_url"><i class="fab fa-youtube"></i> YouTube</label>
                <input type="url" id="youtube_url" name="youtube_url" value="{{ $links['youtube_url'] }}" placeholder="https://youtube.com/...">
            </div>
        </div>

        <div class="form-group">
            <label for="telegram_url"><i class="fab fa-telegram"></i> Telegram</label>
            <input type="url" id="telegram_url" name="telegram_url" value="{{ $links['telegram_url'] }}" placeholder="https://t.me/...">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Links
            </button>
        </div>
    </form>
</div>
@endsection
