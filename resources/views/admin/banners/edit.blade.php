@extends('admin.layout')

@section('title', 'Edit Banner')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Banner</h1>
        <p>Update banner information</p>
    </div>
    <a href="{{ route('admin.banners') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Banner Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $banner->title) }}" required>
            @error('title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="subtitle">Subtitle (optional)</label>
            <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}">
            @error('subtitle')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="bg_color">Background Color</label>
                <input type="color" id="bg_color" name="bg_color" value="{{ old('bg_color', $banner->bg_color) }}">
                @error('bg_color')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="bg_gradient">Gradient (optional)</label>
                <input type="text" id="bg_gradient" name="bg_gradient" value="{{ old('bg_gradient', $banner->bg_gradient) }}">
                @error('bg_gradient')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="image">Banner Image</label>
            @if($banner->image_url)
                <div class="current-image">
                    <img src="{{ $banner->image_url }}" alt="Current banner">
                    <span>Current image</span>
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Leave empty to keep current. Max 5MB.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="link_url">Link URL (optional)</label>
                <input type="url" id="link_url" name="link_url" value="{{ old('link_url', $banner->link_url) }}">
                @error('link_url')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="button_text">Button Text (optional)</label>
                <input type="text" id="button_text" name="button_text" value="{{ old('button_text', $banner->button_text) }}">
                @error('button_text')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $banner->is_visible) ? 'checked' : '' }}>
                <span>Visible on website</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Banner
            </button>
            <a href="{{ route('admin.banners') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
