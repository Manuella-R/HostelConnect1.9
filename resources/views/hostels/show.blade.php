@extends('layout.main-layout')

@section('body')

<div class="hostel-details">
    <h1>{{ $hostel->name }}</h1>

    <table class="table">
        <tbody>
            <tr>
                <td><strong>Rent:</strong></td>
                <td>Ksh{{ number_format($hostel->rent, 2) }}/Month</td>
            </tr>
            <tr>
                <td><strong>Description:</strong></td>
                <td>{{ $hostel->description }}</td>
            </tr>
            <tr>
                <td><strong>Vacant Beds:</strong></td>
                <td>{{ $hostel->vacant_beds }}</td>
            </tr>
            <tr>
                <td><strong>Hostel Rules:</strong></td>
                <td>
                    <ul>
                        @foreach(explode("\n", trim($hostel->rules)) as $rule)
                            @if(!empty($rule))
                                <li>{{ $rule }}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td><strong>Amenities:</strong></td>
                <td>
                    <ul>
                        @php
                            $amenitiesArray = array_map('trim', explode(',', $hostel->amenities));
                        @endphp
                        @foreach($amenitiesArray as $amenity)
                            @if(!empty($amenity))
                                <li>{{ $amenity }}</li>
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td><strong>Constant Water Supply:</strong></td>
                <td>{{ $hostel->constant_water_supply ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td><strong>Private Security:</strong></td>
                <td>{{ $hostel->private_security ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td><strong>Parking Space:</strong></td>
                <td>{{ $hostel->parking_space ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td><strong>Caretaker:</strong></td>
                <td>{{ $hostel->caretaker ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td><strong>Reviews</strong></td>
                <td>
                    @if($reviews->isEmpty())
                        <p>No reviews yet.</p>
                    @else
                        <ul>
                            @foreach($reviews as $review)
                                <li>
                                    {{ $review->review }}
                                    <form action="{{ route('hostels.flag', $review->Review_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary">Flag</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($hostel->photo_proof1)
                        <img src="{{ asset('storage/' . $hostel->photo_proof1) }}" alt="Hostel Photo 1" style="max-width: 300px;">
                    @endif
                </td>
                <td>
                    @if($hostel->photo_proof2)
                        <img src="{{ asset('storage/' . $hostel->photo_proof2) }}" alt="Hostel Photo 2" style="max-width: 300px;">
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if($hostel->photo_proof3)
                        <img src="{{ asset('storage/' . $hostel->photo_proof3) }}" alt="Hostel Photo 3" style="max-width: 300px;">
                    @endif
                </td>
                <td>
                    @if($hostel->photo_proof4)
                        <img src="{{ asset('storage/' . $hostel->photo_proof4) }}" alt="Hostel Photo 4" style="max-width: 300px;">
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if(auth()->check())
                        <p style="visibility:hidden;">User is logged in</p>
                        <p style="visibility:hidden;">User role ID: {{ auth()->user()->user_role_id }}</p>
                        @if(auth()->user()->user_role_id == 1)
                            <a href="{{ route('hostels.showApplicationForm', $hostel->H_id) }}" class="btn btn-primary">Apply</a><br></td>
                            <td> <a href="{{ route('hostels.showReviewForm', $hostel->H_id) }}" class="btn btn-primary">Leave a Review</a></td>
                        @endif
                    @else
                        <p>You need to be logged in to apply for this hostel.</p>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
