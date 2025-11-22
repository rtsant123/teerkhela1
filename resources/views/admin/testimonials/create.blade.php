@extends('admin.layout')

@section('title', 'Add Testimonial')

@section('content')
<div class="page-header">
    <div>
        <h1>Add Testimonial</h1>
        <p>Create a new user testimonial</p>
    </div>
    <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">User Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Enter user's name">
            @error('name')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="quote">Testimonial Quote *</label>
            <textarea id="quote" name="quote" rows="4" required placeholder="Enter the testimonial text">{{ old('quote') }}</textarea>
            @error('quote')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="amount">Winning Amount (optional)</label>
                <input type="text" id="amount" name="amount" value="{{ old('amount') }}" placeholder="e.g., ₹50,000">
                @error('amount')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="rating">Rating *</label>
                <select id="rating" name="rating" required>
                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                </select>
                @error('rating')<span class="error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group">
            <label for="image">Profile Image (optional)</label>
            <input type="file" id="image" name="image" accept="image/*">
            <span class="form-hint">Max 2MB. JPG, PNG, or GIF.</span>
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_visible" value="1" {{ old('is_visible', true) ? 'checked' : '' }}>
                <span>Visible on website</span>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Testimonial
            </button>
            <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
