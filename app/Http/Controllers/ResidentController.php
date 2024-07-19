<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Resident;
use Auth;

class ResidentController extends Controller
{
    public function searchUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return view('profile.search-user', ['user' => $user]);
        } else {
            return view('profile.search-user')->withErrors(['email' => 'User not found']);
        }
    }

    public function addResident($user_id)
    {
        $hostel_id = Auth::user()->hostel_id; // Assuming caretaker is logged in and associated with a hostel
        
        Resident::create([
            'user_id' => $user_id,
            'H_id' => $hostel_id
        ]);

        // Update the user's is_resident status
        $user = User::find($user_id);
        $user->is_resident = 1;
        $user->save();

        return redirect()->route('search_user_form')->with('success', 'Resident added successfully');
    }
}
