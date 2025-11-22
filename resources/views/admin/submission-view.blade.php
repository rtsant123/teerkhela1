@extends('admin.layout')

@section('title', 'View Submission')

@section('content')
<div class="page-header">
    <div>
        <h1>View Submission</h1>
        <p>From: {{ $submission->name }} &lt;{{ $submission->email }}&gt;</p>
    </div>
    <a href="{{ route('admin.submissions') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="submission-detail">
    <div class="submission-card">
        <div class="submission-header">
            <div class="submission-from">
                <div class="avatar"><i class="fas fa-user"></i></div>
                <div>
                    <h3>{{ $submission->name }}</h3>
                    <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a>
                </div>
            </div>
            <div class="submission-date">
                {{ $submission->created_at->format('d M Y, H:i') }}
            </div>
        </div>

        <div class="submission-subject">
            <strong>Subject:</strong> {{ $submission->subject }}
        </div>

        <div class="submission-message">
            {!! nl2br(e($submission->message)) !!}
        </div>

        <div class="submission-actions">
            <a href="mailto:{{ $submission->email }}?subject=Re: {{ $submission->subject }}" class="btn btn-primary">
                <i class="fas fa-reply"></i> Reply via Email
            </a>
            <form action="{{ route('admin.submissions.delete', $submission->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this submission?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    @if($submission->admin_reply)
    <div class="reply-card">
        <h3><i class="fas fa-reply"></i> Admin Reply</h3>
        <div class="reply-content">
            {!! nl2br(e($submission->admin_reply)) !!}
        </div>
        <div class="reply-date">
            Replied: {{ $submission->replied_at->format('d M Y, H:i') }}
        </div>
    </div>
    @else
    <div class="reply-form-card">
        <h3><i class="fas fa-reply"></i> Add Reply Note</h3>
        <form action="{{ route('admin.submissions.reply', $submission->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="reply" rows="5" placeholder="Add a reply note for your records...">{{ old('reply') }}</textarea>
                @error('reply')<span class="error">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Reply Note
            </button>
        </form>
    </div>
    @endif
</div>
@endsection
