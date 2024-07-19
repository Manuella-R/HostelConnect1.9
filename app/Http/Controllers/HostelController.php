<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hostel;
use App\Review;
use App\Resident;
use Illuminate\Support\Facades\Mail;
use App\Mail\HostelApplicationMail;

class HostelController extends Controller
{
    // Method to show hostel details
    public function show($id)
    {
        $hostel = Hostel::findOrFail($id);
        $reviews = Review::whereHas('resident', function ($query) use ($id) {
            $query->where('H_id', $id);
        })->get();

        return view('hostels.show', compact('hostel', 'reviews'));
    }

    // Method to handle sending application
    public function sendApplication(Request $request, $id)
    {
        $hostel = Hostel::findOrFail($id);

        // Check if $hostel has an owner
        if (!$hostel->user) {
            return redirect()->back()->with('error', 'Hostel owner not found');
        }

        $user = auth()->user();

        // Validate the request
        $request->validate([
            'personality' => 'required|string',
            'expectations' => 'required|string'
        ]);

        // Define the email content
        $emailContent = [
            'user' => $user,
            'hostel' => $hostel,
            'name' => $request->name,
            'gender' => $request->Gender,
            'University' => $request->University,
            'personality' => $request->personality,
            'expectations' => $request->expectations
        ];

        // Send the email to the hostel owner's email address
        Mail::to($hostel->user->email)->send(new HostelApplicationMail($emailContent));

        return redirect()->back()->with('success', 'Application sent successfully!');
    }

    // Method to store reviews
    public function storeReview(Request $request, $hostelId)
    {
        $request->validate([
            'review' => 'required|string',
        ]);

        $resident = Resident::where('user_id', auth()->id())->where('H_id', $hostelId)->first();

        if (!$resident) {
            return redirect()->back()->with('You are not a resident of this hostel.');
        }

        Review::create([
            'R_id' => $resident->R_id,
            'review' => $request->review,
        ]);

        return redirect()->route('hostels.show', $hostelId);
    }

    public function showApplicationForm($id)
    {
        $hostel = Hostel::findOrFail($id);

        return view('hostels.apply', compact('hostel'));
    }

    public function showReviewForm($id)
    {
        $hostel = Hostel::findOrFail($id);

        return view('hostels.review', compact('hostel'));
    }
    public function flag($id)
    {
        $review = Review::findOrFail($id);
        $review->flagged = true;
        $review->save();

        return redirect()->back()->with('success', 'Review flagged successfully.');
    }

    public function general(Request $request)
    {
        $query = Hostel::query();

        // Filter by rent range
        if ($request->has('min_rent')) {
            $query->where('rent', '>=', $request->input('min_rent'));
        }
        if ($request->has('max_rent')) {
            $query->where('rent', '<=', $request->input('max_rent'));
        }

        // Filter by boolean values
        $booleanFilters = ['constant_water_supply', 'private_security', 'parking_space', 'caretaker'];
        foreach ($booleanFilters as $filter) {
            if ($request->has($filter)) {
                $query->where($filter, true);
            }
        }

        $hostels = $query->get();

        return view('hostels.general', compact('hostels'));
    }
}
