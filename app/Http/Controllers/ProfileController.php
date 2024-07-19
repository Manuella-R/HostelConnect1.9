<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use App\UserDescription;
use App\Hostel;
use App\Review;  
use App\Resident; 
use App\Expenditure;
use Illuminate\Http\Request;
use Hash;
use App\User;
use Mail;
use App\Mail\ResidentInvitation;
use Illuminate\Support\Str;
use App\Mail\EmailVerificationMail;
use App\Notification; 



class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $data['user'] = $user;
        $data['userDescription'] = $user->userDescription; // Adjust this according to your actual relationship name
        
        return view('profile.dashboard', $data);
    }

   
    public function edit_profile(){
    	$user=auth()->user();
    	$data['user']=$user;
    	return view('profile.edit_profile',$data);
    }

    public function update_profile(Request $request){
    	 $request->validate([
         'first_name'=>'required|min:2|max:100',
         'last_name'=>'required|min:2|max:100',
         ],[
            'first_name.required'=>'First name is required',
            'last_name.required'=>'Last name is required',
         ]);

         $user=auth()->user();

         $user->update([
         	'first_name'=>$request->first_name,
         	'last_name'=>$request->last_name,
         ]);

         return redirect()->route('edit_profile')->with('success','Profile successfully updated');

    }

    public function change_password(){ 
        return view('profile.change_password');
    }


    public function update_password(Request $request){
        $request->validate([
        'old_password'=>'required|min:6|max:100',
        'new_password'=>'required|min:6|max:100',
        'confirm_password'=>'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if(Hash::check($request->old_password,$current_user->password)){

            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('success','Password successfully updated.');

        }else{
            return redirect()->back()->with('error','Old password does not matched.');
        }



    }
    public function edit_userinfo(){
        $user=auth()->user();
    	$data['user']=$user;
    	return view('profile.user_desc',$data);
    }

    public function updateUserinfo(Request $request)
    {
        $request->validate([
            'gender' => 'nullable|string|max:255',
            'admission_number' => 'nullable|integer',
            'personality' => 'nullable|string',
            'describe_yourself' => 'nullable|string',
        ]);
    
        // Retrieve authenticated user
        $user = auth()->user();
    
        // Update or create user description
        $userDescription = UserDescription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => $request->gender,
                'admission_number' => $request->admission_number,
                'personality' => $request->personality,
                'describe_yourself' => $request->describe_yourself,
            ]
        );
    
        return redirect()->route('edit_userinfo')->with('success', 'Profile updated successfully');
    }

public function hostel_info_main()
{
    $user = auth()->user();
    $hostel = Hostel::where('user_id', $user->id)->first(); // Retrieve hostel info for the authenticated user

    // Check if hostel information exists
    if ($hostel) {
        return view('profile.hostelinfo', compact('user', 'hostel'));
    } else {
        return redirect()->route('update_hostel_info'); // Redirect to update page if hostel info doesn't exist
    }
}


public function hostel_info(){
    $user=auth()->user();
    $data['user']=$user;
    return view('profile.hostel_info',$data);
}

public function updatehostel_info(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'rent' => 'nullable|integer',
        'amenities' => 'nullable|string|max:255',
        'rules' => 'nullable|string',
        'availability' => 'nullable|boolean',
        'number_beds' => 'nullable|integer',
        'vacant_beds' => 'nullable|integer',
        'constant_water_supply' => 'nullable|boolean',
        'private_security' => 'nullable|boolean',
        'parking_space' => 'nullable|boolean',
        'caretaker' => 'nullable|boolean',
        'photo_proof1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'photo_proof2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'photo_proof3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'photo_proof4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->only([
        'name', 'address', 'description', 'rent', 'amenities', 'rules',
        'availability', 'number_beds', 'vacant_beds', 'constant_water_supply',
        'private_security', 'parking_space', 'caretaker'
    ]);

    if ($request->hasFile('photo_proof1')) {
        $data['photo_proof1'] = $request->file('photo_proof1')->store('photos', 'public');
    }
    if ($request->hasFile('photo_proof2')) {
        $data['photo_proof2'] = $request->file('photo_proof2')->store('photos', 'public');
    }
    if ($request->hasFile('photo_proof3')) {
        $data['photo_proof3'] = $request->file('photo_proof3')->store('photos', 'public');
    }
    if ($request->hasFile('photo_proof4')) {
        $data['photo_proof4'] = $request->file('photo_proof4')->store('photos', 'public');
    }

    // Retrieve authenticated user
    $user = auth()->user();

    // Update or create hostel info
    $hostel = Hostel::updateOrCreate(
        ['user_id' => $user->id], // Find the hostel record by user_id or create a new one if not found
        $data
    );

    return redirect()->route('hostel_info')->with('success', 'Hostel information updated successfully');
}


public function approveHostelOwner($id) {
    $hostelOwner = User::find($id);
    $hostelOwner->is_active = true;
    $hostelOwner->save();

    // Use existing verification code
    $verification_code = $hostelOwner->email_verification_code;

    // Send verification email
    Mail::to($hostelOwner->email)->send(new EmailVerificationMail($hostelOwner, $verification_code));

    return redirect()->route('manager')->with('success', 'Hostel owner approved and verification email sent.');
}

public function verify_email($verification_code)
{
    $user = User::where('email_verification_code', $verification_code)->first();
    if (!$user) {
        return redirect()->route('getRegister')->with('error', 'Invalid URL');
    } else {
        if ($user->email_verified_at) {
            return redirect()->route('getRegister')->with('error', 'Email already verified');
        } else {
            $user->update([
                'email_verified_at' => \Carbon\Carbon::now()
            ]);
            return redirect()->route('getRegister')->with('success', 'Email successfully verified');
        }
    }
}

public function declineHostelOwner($id) {
    $hostelOwner = User::find($id);
    $hostelOwner->delete();

    return redirect()->route('manager')->with('success', 'Hostel owner declined and removed.');
}

public function deleteHostelOwner($id) {
    $hostelOwner = User::find($id);
    $hostelOwner->delete();

    return redirect()->route('manager')->with('success', 'Hostel owner deleted.');
}

public function manager() {
    $hostelOwners = User::where('user_role_id', 3)->with('hostel')->get(); // Assuming role_id 3 is for hostel owners and eager loading hostels
    return view('profile.manager', compact('hostelOwners'));
}

public function viewFlaggedReviews() {
    $flaggedReviews = Review::where('flagged', true)->get();
    return view('admin.flagged-reviews', compact('flaggedReviews'));
}

public function unflagReview($id) {
    $review = Review::find($id);
    $review->flagged = false;
    $review->save();

    return redirect()->back()->with('success', 'Review unflagged successfully.');
}

public function deleteReview($id) {
    $review = Review::find($id);
    $review->delete();

    return redirect()->back()->with('success', 'Review deleted successfully.');
}

public function viewResidents()
{
    // Get current logged-in caretaker
    $caretaker = auth()->user();

    // Check if caretaker is associated with any hostel
    $hostel = $caretaker->hostel()->first();

    if (!$hostel) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'Caretaker is not associated with any hostel']);
    }

    // Get all residents of the current hostel
    $residents = Resident::where('H_id', $hostel->H_id)->get(); // Assuming 'H_id' is the primary key of the Hostel model

    // Pass hostel and residents data to the view using compact()
    return view('hostels.residents', [
        'residents' => $residents,
        'hostel' => $hostel, // Pass the $hostel variable to the view
    ]);
}
public function removeResident($user_id)
{
    // Get current logged-in caretaker
    $caretaker = auth()->user();

    // Check if caretaker is associated with any hostel
    $hostel = $caretaker->hostel()->first();

    if (!$hostel) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'Caretaker is not associated with any hostel']);
    }

    // Find the user based on $user_id
    $user = User::find($user_id);

    if (!$user) {
        return redirect()->route('viewResidents')->withErrors(['error' => 'User not found']);
    }

    // Update the user's is_resident status
    $user->is_resident = 0;
    $user->save();

    // Remove the resident entry from the Resident table
    Resident::where('user_id', $user_id)->where('H_id', $hostel->H_id)->delete();

    return redirect()->route('viewResidents')->with('success', 'Resident removed successfully');
}


public function searchUserForm()
    {
        return view('profile.search_user');
    }

// ProfileController.php

public function searchUser(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user) {
        return view('profile.search_user', ['user' => $user]);
    } else {
        return view('profile.search_user')->withErrors(['email' => 'User not found']);
    }
}

public function addResident($user_id)
{
    $caretaker = Auth::user();
    $hostel = $caretaker->hostel()->first(); // Retrieve the hostel relationship

    if (!$hostel) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'You are not associated with any hostel']);
    }

    // Find the user based on $user_id
    $user = User::find($user_id);

    if (!$user) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'User not found']);
    }

    // Check if user already has an invitation token
    if (!$user->invitation_token) {
        // Generate a unique token for the email invitation
        $token = Str::random(60);
        $user->invitation_token = $token;
        $user->save();
    } else {
        $token = $user->invitation_token;
    }

    // Send email to the potential resident
    Mail::send('emails.resident_invitation', ['user' => $user, 'token' => $token, 'hostel' => $hostel], function($message) use ($user) {
        $message->to($user->email);
        $message->subject('Hostel Invitation');
    });

    return redirect()->route('search_user_form')->with('success', 'Invitation sent successfully');
}

public function acceptInvitation($token)
{
    // Find the user based on the invitation token
    $user = User::where('invitation_token', $token)->first();

    if (!$user) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'Invalid invitation token']);
    }

    // Update the user's is_resident status
    $user->is_resident = true;
    $user->save();

    // Retrieve the authenticated caretaker
    $caretaker = Auth::user();

    if (!$caretaker) {
        return redirect()->route('login'); // Redirect to login if caretaker is not authenticated
    }

    // Retrieve the hostel associated with the caretaker
    $hostel = $caretaker->hostel()->first();

    if (!$hostel) {
        return redirect()->route('search_user_form')->withErrors(['error' => 'Caretaker is not associated with any hostel']);
    }

    // Use Resident model from App\Models namespace
    $resident = new Resident();
    $resident->user_id = $user->id;
    $resident->H_id = $hostel->H_id; // Assign the hostel ID
    $resident->save();

    // Redirect to the profile dashboard with a success messagereturn
    return redirect()->back()->with('success','successfully updated.');
   
}
public function storeReview(Request $request, $hostelId)
    {
        $request->validate([
            'review' => 'required|string',
        ]);

        $resident = Resident::where('user_id', auth()->id())->where('H_id', $hostelId)->first();

        if (!$resident) {
            return redirect()->back()->withErrors(['error' => 'You are not a resident of a hostel.']);
        }

        Review::create([
            'R_id' => $resident->R_id,
            'review' => $request->input('review'),
        ]);

        return redirect()->route('hostels.show', $hostelId);
    }

    
}

