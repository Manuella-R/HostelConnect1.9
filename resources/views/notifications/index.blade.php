@extends('profile.profile-layout')
@section('profile')
<div class="container">
    <h1>Notifications</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('notifications.create') }}" class="btn btn-primary mb-3">Create Notification</a>

    @if ($hasNotifications)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->notification }}</td>
                        <td>{{ $notification->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('notifications.edit', $notification->Notification_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('notifications.destroy', $notification->Notification_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No notifications available.</p>
    @endif
</div>
@endsection
