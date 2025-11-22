@extends('admin.layout')

@section('title', 'Create Popup')

@section('content')
<div class="page-header">
    <div>
        <h1>Create Popup</h1>
        <p>Create a new popup ad or promotion</p>
    </div>
    <a href="{{ route('admin.popups') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.popups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Popup Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Enter popup title">
            @error('title')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3" placeholder="Enter popup description">{{ old('description') }}</textarea>
            @error('description')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="image">Popup Image (optional)</label>
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Recommended: 400x300px. Max 5MB.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="button_text">Button Text</label>
                <input type="text" id="button_text" name="button_text" value="{{ old('button_text', 'Learn More') }}" placeholder="Learn More">
                @error('button_text')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="button_link">Button Link</label>
                <input type="url" id="button_link" name="button_link" value="{{ old('button_link') }}" placeholder="https://example.com">
                @error('button_link')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="display_rule">Display Rule *</label>
                <select id="display_rule" name="display_rule" required>
                    <option value="once_per_session" {{ old('display_rule') == 'once_per_session' ? 'selected' : '' }}>Once per session</option>
                    <option value="every_visit" {{ old('display_rule') == 'every_visit' ? 'selected' : '' }}>Every page visit</option>
                    <option value="once_per_day" {{ old('display_rule') == 'once_per_day' ? 'selected' : '' }}>Once per day</option>
                </select>
                @error('display_rule')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="delay_seconds">Delay (seconds) *</label>
                <input type="number" id="delay_seconds" name="delay_seconds" value="{{ old('delay_seconds', 3) }}" min="0" max="60" required>
                @error('delay_seconds')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <span>Active (show popup)</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create Popup
            </button>
            <a href="{{ route('admin.popups') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
