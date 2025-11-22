@extends('admin.layout')

@section('title', 'Edit Testimonial')

@section('content')
<div class="page-header">
    <div>
        <h1>Edit Testimonial</h1>
        <p>Update testimonial information</p>
    </div>
    <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">User Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required>
            @error('name')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="quote">Testimonial Quote *</label>
            <textarea id="quote" name="quote" rows="4" required>{{ old('quote', $testimonial->quote) }}</textarea>
            @error('quote')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="amount">Winning Amount (optional)</label>
                <input type="text" id="amount" name="amount" value="{{ old('amount', $testimonial->amount) }}">
                @error('amount')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="rating">Rating *</label>
                <select id="rating" name="rating" required>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Star' : 'Stars' }}</option>
                    @endfor
                </select>
                @error('rating')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            @if($testimonial->image_url)
                <div class="current-image">
                    <img src="{{ $testimonial->image_url }}" alt="Current image">
                    <span>Current image</span>
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Leave empty to keep current image. Max 2MB.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', $testimonial->is_visible) ? 'checked' : '' }}>
                <span>Visible on website</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Testimonial
            </button>
            <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
