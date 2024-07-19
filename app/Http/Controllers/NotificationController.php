<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notification;
use App\Resident;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch notifications for the current hostel owner
        $notifications = Notification::where('H_id', auth()->user()->hostel->H_id)->orderByDesc('created_at')->get();
    
        // Check if notifications are empty
        $hasNotifications = !$notifications->isEmpty();
    
        return view('notifications.index', compact('notifications', 'hasNotifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        // Create the notification
        $notification = Notification::create([
            'H_id' => auth()->user()->hostel->H_id,
            'notification' => $request->message,
        ]);

        // Fetch all residents of the hostel
        $residents = Resident::where('H_id', auth()->user()->hostel->H_id)->get();

        // Attach the notification to all residents
        foreach ($residents as $resident) {
            $notification->residents()->attach($resident->R_id);
        }

        return redirect()->route('notifications.index')->with('success', 'Notification added successfully.');
    }

    public function edit(Notification $notification)
    {
        return view('notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $notification->update([
            'notification' => $request->message,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully.');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully.');
    }

    public function view()
{
    // Get the authenticated user
    $user = Auth::user();
    
    // Fetch all residents of the authenticated user
    $residents = $user->resident()->get();

    // Initialize an empty collection for notifications
    $notifications = collect();

    // Check if $residents is not empty and iterable
    if ($residents->isNotEmpty()) {
        // Fetch notifications for each resident's hostel
        foreach ($residents as $resident) {
            // Fetch notifications for the hostel associated with the resident
            $hostelNotifications = Notification::where('H_id', $resident->H_id)->get();
            
            // Merge the notifications of each hostel into the $notifications collection
            $notifications = $notifications->merge($hostelNotifications);
        }
    }

    // Remove duplicate notifications (if any)
    $notifications = $notifications->unique('Notification_id');

    // Check if there are notifications to display
    $hasNotifications = !$notifications->isEmpty();

    return view('notifications.view', compact('notifications', 'hasNotifications'));
}




}
