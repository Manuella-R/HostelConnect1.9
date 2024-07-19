@extends('profile.profile-layout')
@section('profile')
<div class="container">
    <h1>Edit Notification</h1>

    <form action="{{ route('tickets.update', $ticket->ticket_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="notification" class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('message', $notification->message) }}</textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('ticket.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

