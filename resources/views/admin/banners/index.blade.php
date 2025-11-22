@extends('admin.layout')

@section('title', 'Banners')

@section('content')
<div class="page-header">
    <div>
        <h1>Banners</h1>
        <p>Manage homepage banners</p>
    </div>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Banner
    </a>
</div>

@if(count($banners) > 0)
<div class="cards-grid">
    @foreach($banners as $banner)
    <div class="banner-card">
        <div class="banner-preview" style="background: {{ $banner->bg_gradient ?? $banner->bg_color }}">
            @if($banner->image_url)
                <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}">
            @else
                <div class="banner-text-preview">
                    <h3>{{ $banner->title }}</h3>
                    @if($banner->subtitle)<p>{{ $banner->subtitle }}</p>@endif
                </div>
            @endif
        </div>
        <div class="banner-info">
            <h4>{{ $banner->title }}</h4>
            <p>{{ $banner->subtitle ?? 'No subtitle' }}</p>
        </div>
        <div class="banner-actions">
            <form action="{{ route('admin.banners.toggle', $banner->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="toggle-btn {{ $banner->is_visible ? 'active' : '' }}" title="{{ $banner->is_visible ? 'Hide' : 'Show' }}">
                    <i class="fas fa-{{ $banner->is_visible ? 'eye' : 'eye-slash' }}"></i>
                </button>
            </form>
            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn-icon edit" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('admin.banners.delete', $banner->id) }}" method="POST" onsubmit="return confirm('Delete this banner?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-icon delete" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="empty-state">
    <i class="fas fa-image"></i>
    <h3>No Banners Yet</h3>
    <p>Create your first banner to display on the homepage.</p>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Banner
    </a>
</div>
@endif
@endsection
