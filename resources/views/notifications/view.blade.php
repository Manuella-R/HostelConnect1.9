@extends('profile.profile-layout')

@section('profile')
<div class="container">
    <h1>Your Notifications</h1>
    @if ($hasNotifications)
        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item">
                    <strong>{{ $notification->hostel->name }}</strong>: {{ $notification->notification }}
                    <br>
                    <small>Created At: {{ $notification->created_at->format('Y-m-d H:i:s') }}</small>
                </li>
            @endforeach
        </ul>
    @else
        <p>No notifications available.</p>
    @endif
</div>
@endsection
