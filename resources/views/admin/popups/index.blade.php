@extends('admin.layout')

@section('title', 'Popups')

@section('content')
<div class="page-header">
    <div>
        <h1>Popups</h1>
        <p>Manage popup ads and promotions</p>
    </div>
    <a href="{{ route('admin.popups.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Create Popup
    </a>
</div>

@if(count($popups) > 0)
<div class="table-responsive">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Display Rule</th>
                <th>Impressions</th>
                <th>Clicks</th>
                <th>CTR</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($popups as $popup)
            <tr>
                <td>
                    <strong>{{ $popup->title }}</strong>
                    @if($popup->description)
                        <br><small class="text-muted">{{ Str::limit($popup->description, 50) }}</small>
                    @endif
                </td>
                <td>
                    <span class="badge badge-info">{{ ucwords(str_replace('_', ' ', $popup->display_rule)) }}</span>
                    <br><small>{{ $popup->delay_seconds }}s delay</small>
                </td>
                <td>{{ number_format($popup->impressions) }}</td>
                <td>{{ number_format($popup->clicks) }}</td>
                <td>
                    <span class="badge {{ $popup->click_rate >= 5 ? 'badge-success' : ($popup->click_rate >= 2 ? 'badge-warning' : 'badge-secondary') }}">
                        {{ $popup->click_rate }}%
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.popups.toggle', $popup->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="toggle-btn {{ $popup->is_active ? 'active' : '' }}">
                            <i class="fas fa-{{ $popup->is_active ? 'check-circle' : 'times-circle' }}"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.popups.edit', $popup->id) }}" class="btn-icon edit" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.popups.reset', $popup->id) }}" method="POST" onsubmit="return confirm('Reset statistics?')">
                            @csrf
                            <button type="submit" class="btn-icon" title="Reset Stats">
                                <i class="fas fa-redo"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.popups.delete', $popup->id) }}" method="POST" onsubmit="return confirm('Delete this popup?')">
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
    <i class="fas fa-window-restore"></i>
    <h3>No Popups Yet</h3>
    <p>Create your first popup to promote features or announcements.</p>
    <a href="{{ route('admin.popups.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Create Popup
    </a>
</div>
@endif
@endsection
