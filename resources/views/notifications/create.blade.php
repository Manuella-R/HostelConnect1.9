@extends('profile.profile-layout')
@section('profile')
<div class="container">
    <h1>Create Notification</h1>

    <form action="{{ route('notifications.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('message') }}</textarea>
            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('notifications.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
