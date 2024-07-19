@extends('profile.profile-layout')

@section('profile')
<div class="user-list">
    @foreach($hostelOwners as $owner)
        <div class="user-card">
            <div class="user-card-header" onclick="toggleCard({{ $owner->id }})">
                <div class="user-info">
                    <div>
                        <div class="name">{{ $owner->first_name }} {{ $owner->last_name }}</div>
                    </div>
                </div>
                <div class="toggle-icon">▼</div>
            </div>
            <div class="user-card-body" id="body-{{ $owner->id }}">
                <div class="description">{{ $owner->description }}</div>
                <div class="email">Email: {{ $owner->email }}</div>
                <div class="phone_number">Phone number: {{ $owner->phone_number }}</div>
                @if ($owner->hostel)
                            <div class="establishment_name">Hostel: {{ $owner->hostel->name }}</div>
                            <div class="address">Address: {{ $owner->hostel->address }}</div>
                        @endif
                <div class="actions">
                    <form action="{{ route('hostel-owners.approve', $owner->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('hostel-owners.delete', $owner->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
<script>
    function toggleCard(id) {
        const body = document.getElementById('body-' + id);
        body.classList.toggle('active');
    }
</script>
