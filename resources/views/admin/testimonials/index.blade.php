@extends('admin.layout')

@section('title', 'Testimonials')

@section('content')
<div class="page-header">
    <div>
        <h1>Testimonials</h1>
        <p>Manage user testimonials displayed on the homepage</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Testimonial
    </a>
</div>

@if(count($testimonials) > 0)
<div class="table-responsive">
    <table class="admin-table">
        <thead>
            <tr>
                <th>User</th>
                <th>Quote</th>
                <th>Amount</th>
                <th>Rating</th>
                <th>Visible</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>
                    <div class="user-cell">
                        @if($testimonial->image_url)
                            <img src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}" class="user-avatar">
                        @else
                            <div class="user-avatar placeholder"><i class="fas fa-user"></i></div>
                        @endif
                        <span>{{ $testimonial->name }}</span>
                    </div>
                </td>
                <td class="quote-cell">{{ Str::limit($testimonial->quote, 80) }}</td>
                <td>{{ $testimonial->amount ?? '-' }}</td>
                <td>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $testimonial->rating ? 'active' : '' }}"></i>
                        @endfor
                    </div>
                </td>
                <td>
                    <form action="{{ route('admin.testimonials.toggle', $testimonial->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="toggle-btn {{ $testimonial->is_visible ? 'active' : '' }}">
                            <i class="fas fa-{{ $testimonial->is_visible ? 'eye' : 'eye-slash' }}"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-icon edit" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.delete', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="empty-state">
    <i class="fas fa-comments"></i>
    <h3>No Testimonials Yet</h3>
    <p>Add your first testimonial to showcase on the homepage.</p>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Testimonial
    </a>
</div>
@endif
@endsection
