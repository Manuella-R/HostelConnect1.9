<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ticket;
use App\Resident;
use App\User;
use App\Hostel;

class TicketController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Fetch tickets for the current user's residents
    $tickets = Ticket::whereHas('resident', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->orderByDesc('created_at')->get();

    // Check if tickets are not empty
    $hasTickets = !$tickets->isEmpty();

    // Map 'is_solved' to status strings
    $tickets->transform(function ($ticket) {
        $ticket->status = $ticket->is_solved ? 'Solved' : 'Pending';
        return $ticket;
    });

    return view('tickets.index', compact('tickets', 'hasTickets'));
}


    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'message' => 'required|string',
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Check if the user has a resident record
    if ($user->resident) {
        // Create a ticket associated with the user's resident
        Ticket::create([
            'R_id' => $user->resident->R_id,
            'ticket' => $request->message,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket uploaded successfully.');
    }

    // Handle the case where user doesn't have a resident record
    return redirect()->route('home')->with('error', 'User does not have a resident record.');
}

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $ticket->update([
            'ticket' => $request->message,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }

    public function view()
{
    // Get the authenticated user
    $user = Auth::user();

    // Fetch hostels associated with the authenticated user
    $hostels = Hostel::where('user_id', $user->id)->pluck('H_id')->toArray();

    // Fetch tickets for these hostels
    $tickets = Ticket::whereIn('R_id', Resident::whereIn('H_id', $hostels)->pluck('R_id')->toArray())
                      ->orderByDesc('created_at')
                      ->get();

    // Check if tickets are empty
    $hasTickets = !$tickets->isEmpty();

    return view('tickets.view', compact('tickets', 'hasTickets'));
}


public function markSolved(Ticket $ticket)
{
    // Toggle the is_solved status
    $ticket->update([
        'is_solved' => !$ticket->is_solved,
    ]);

    return redirect()->back()->with('success', 'Ticket status updated.');
}

}
