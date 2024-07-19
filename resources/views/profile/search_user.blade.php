@extends('profile.profile-layout')
@section('profile')
    <form action="{{ route('searchUser') }}" method="GET">
        <div class="form-group">
            <label for="email">Search User by Email:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($user))
        <h2>Search Results:</h2>
        <ul class="list-group">
            <li class="list-group-item">
                {{ $user->email }}
                <form action="{{ route('addResident', ['user_id' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add Resident</button>
                </form>
            </li>
        </ul>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
