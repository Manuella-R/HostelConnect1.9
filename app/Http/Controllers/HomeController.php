<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hostel;
use Newsletter;

class HomeController extends Controller
{
    public function home()
    {
     
        $latestHostel = Hostel::with('user')->orderBy('created_at', 'desc')->take(10)->get();

        // Pass both user and hostels data to the view
        return view('home', compact('user', 'latestHostel'));
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'subscriber_email' => 'required|email'
        ]);

        try {
            if (Newsletter::isSubscribed($request->subscriber_email)) {
                return redirect()->back()->with('error', 'Email already subscribed');
            } else {
                Newsletter::subscribe($request->subscriber_email);
                return redirect()->back()->with('success', 'Email subscribed');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
