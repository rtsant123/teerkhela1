@extends('admin.layout')

@section('title', 'Edit Popup')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Popup</h1>
        <p>Update popup settings</p>
    </div>
    <a href="{{ route('admin.popups') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.popups.update', $popup->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Popup Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $popup->title) }}" required>
            @error('title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $popup->description) }}</textarea>
            @error('description')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="image">Popup Image</label>
            @if($popup->image_url)
                <div class="current-image">
                    <img src="{{ $popup->image_url }}" alt="Current popup image">
                    <span>Current image</span>
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Leave empty to keep current. Max 5MB.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="button_text">Button Text</label>
                <input type="text" id="button_text" name="button_text" value="{{ old('button_text', $popup->button_text) }}">
                @error('button_text')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="button_link">Button Link</label>
                <input type="url" id="button_link" name="button_link" value="{{ old('button_link', $popup->button_link) }}">
                @error('button_link')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="display_rule">Display Rule *</label>
                <select id="display_rule" name="display_rule" required>
                    <option value="once_per_session" {{ old('display_rule', $popup->display_rule) == 'once_per_session' ? 'selected' : '' }}>Once per session</option>
                    <option value="every_visit" {{ old('display_rule', $popup->display_rule) == 'every_visit' ? 'selected' : '' }}>Every page visit</option>
                    <option value="once_per_day" {{ old('display_rule', $popup->display_rule) == 'once_per_day' ? 'selected' : '' }}>Once per day</option>
                </select>
                @error('display_rule')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="delay_seconds">Delay (seconds) *</label>
                <input type="number" id="delay_seconds" name="delay_seconds" value="{{ old('delay_seconds', $popup->delay_seconds) }}" min="0" max="60" required>
                @error('delay_seconds')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $popup->is_active) ? 'checked' : '' }}>
                <span>Active (show popup)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Popup
            </button>
            <a href="{{ route('admin.popups') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
