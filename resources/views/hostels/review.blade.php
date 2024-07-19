<!-- review.blade.php -->

@extends('layout.main-layout')

@section('body')

<div class="container">
    <h1>Review for {{ $hostel->name }}</h1>

    <form action="{{ route('hostels.storeReview', $hostel->H_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="review">Leave a Review:</label>
            <textarea name="review" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>

@endsection
