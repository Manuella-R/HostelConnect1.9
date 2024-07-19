@extends('profile.profile-layout')

@section('profile')

<h1>All Residents of {{ $hostel->name }}</h1>

@if ($residents->isEmpty())
    <p>No residents found.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($residents as $resident)
                <tr>
                    <td>{{ $resident->user->first_name }}</td>
                    <td>{{ $resident->user->email }}</td>
                    <td>{{ $resident->user->phone_number }}</td>
                    <!-- Add more columns as needed -->
                    <td>
                        <form action="{{ route('removeResident', $resident->user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this resident?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
