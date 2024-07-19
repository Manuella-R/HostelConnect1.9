<!-- apply.blade.php -->

@extends('layout.main-layout')

@section('body')

<div class="container">
    <h1>Apply to {{ $hostel->name }}</h1>

    <form action="{{ route('hostels.sendApplication', $hostel->H_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Full Name"required>
        </div>
        <div class="form-group">
    <label for="gender">Gender:</label>
    <select name="Gender" class="form-control" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
       </div>
        <div class="form-group">
            <label for="personality">University:</label>
            <input type="text" name="university" class="form-control"  placeholder="University Name"required>
        </div>
        <div class="form-group">
            <label for="personality">Personality Description:</label>
            <textarea name="personality" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="expectations">Neighbour Expectations:</label>
            <textarea name="expectations" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>

@endsection
