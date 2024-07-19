@extends('profile.profile-layout')
@section('profile')

<div class="flagged-reviews">
    <h1>Flagged Reviews</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($flaggedReviews->isEmpty())
        <p>No flagged reviews.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Review</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flaggedReviews as $review)
                    <tr>
                        <td>{{ $review->review }}</td>
                        <td>
                            <form action="{{ route('admin.reviews.unflag', $review->Review_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm">Unflag</button>
                            </form>
                            <form action="{{ route('admin.reviews.delete', $review->Review_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
