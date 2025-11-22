@extends('admin.layout')

@section('title', 'Add Banner')

@section('content')
<div class="page-header">
    <div>
        <h1>Add Banner</h1>
        <p>Create a new homepage banner</p>
    </div>
    <a href="{{ route('admin.banners') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Banner Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Enter banner title">
            @error('title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle (optional)</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Enter subtitle">
            @error('subtitle')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="bg_color">Background Color</label>
                <input type="color" id="bg_color" name="bg_color" value="{{ old('bg_color', '#667eea') }}">
                @error('bg_color')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="bg_gradient">Gradient (optional)</label>
                <input type="text" id="bg_gradient" name="bg_gradient" value="{{ old('bg_gradient') }}" placeholder="e.g., linear-gradient(135deg, #667eea, #764ba2)">
                @error('bg_gradient')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="image">Banner Image (optional)</label>
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Recommended size: 1200x400px. Max 5MB.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="link_url">Link URL (optional)</label>
                <input type="url" id="link_url" name="link_url" value="{{ old('link_url') }}" placeholder="https://example.com">
                @error('link_url')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="button_text">Button Text (optional)</label>
                <input type="text" id="button_text" name="button_text" value="{{ old('button_text') }}" placeholder="Learn More">
                @error('button_text')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', true) ? 'checked' : '' }}>
                <span>Visible on website</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Banner
            </button>
            <a href="{{ route('admin.banners') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
