@extends('admin.layout')

@section('title', 'Contact Submissions')

@section('content')
<div class="page-header">
    <div>
        <h1>Contact Submissions</h1>
        <p>View and manage contact form submissions</p>
    </div>
    <div class="header-actions">
        <a href="{{ route('admin.submissions') }}" class="btn btn-secondary {{ !request('filter') ? 'active' : '' }}">All</a>
        <a href="{{ route('admin.submissions', ['filter' => 'unread']) }}" class="btn btn-secondary {{ request('filter') == 'unread' ? 'active' : '' }}">Unread</a>
    </div>
</div>

<!-- Search -->
<div class="search-bar">
    <form action="{{ route('admin.submissions') }}" method="GET">
        @if(request('filter'))
            <input type="hidden" name="filter" value="{{ request('filter') }}">
        @endif
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, or subject...">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

@if(count($submissions) > 0)
<div class="table-responsive">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Status</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
            <tr class="{{ !$submission->is_read ? 'unread' : '' }}">
                <td>
                    @if(!$submission->is_read)
                        <span class="status-badge unread">New</span>
                    @elseif($submission->replied_at)
                        <span class="status-badge replied">Replied</span>
                    @else
                        <span class="status-badge read">Read</span>
                    @endif
                </td>
                <td><strong>{{ $submission->name }}</strong></td>
                <td>{{ $submission->email }}</td>
                <td>{{ Str::limit($submission->subject, 40) }}</td>
                <td>{{ $submission->created_at->format('d M Y H:i') }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('admin.submissions.view', $submission->id) }}" class="btn-icon" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.submissions.delete', $submission->id) }}" method="POST" onsubmit="return confirm('Delete this submission?')">
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

{{ $submissions->links() }}
@else
<div class="empty-state">
    <i class="fas fa-envelope"></i>
    <h3>No Submissions</h3>
    <p>{{ request('filter') == 'unread' ? 'No unread submissions.' : 'No contact form submissions yet.' }}</p>
</div>
@endif
@endsection
