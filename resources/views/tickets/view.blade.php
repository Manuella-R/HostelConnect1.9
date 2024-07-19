@extends('profile.profile-layout')

@section('profile')
<div class="container">
    <h1>Tickets</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($hasTickets)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Notification</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->ticket }}</td>
                        <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>Status: {{ $ticket->is_solved ? 'Solved' : 'Pending' }}</td>
                        <td>
                            <form action="{{ route('tickets.markSolved', $ticket->ticket_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ $ticket->is_solved ? 'Mark Unsolved' : 'Mark Solved' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No Ticket posted.</p>
    @endif
</div>
@endsection
