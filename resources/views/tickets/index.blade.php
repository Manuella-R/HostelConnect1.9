@extends('profile.profile-layout')
@section('profile')
<div class="container">
    <h1>Tickets</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create Tickets</a>

    @if ($hasTickets)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->ticket }}</td>
                        <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('tickets.edit', $ticket->ticket_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tickets.destroy', $ticket->ticket_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        <td>Status: {{ $ticket->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tickets posted.</p>
    @endif
</div>
@endsection
