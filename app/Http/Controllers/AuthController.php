<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Mail;
use App\Mail\EmailVerificationMail;
use App\PasswordReset;
use App\Mail\ForgetPasswordMail;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function getRegister(){
    	return view('auth.register');
    }

    public function check_email_unique(Request $request){
    	$user=User::where('email',$request->email)->first();
    	if($user){
    		echo 'false';
    	}else{
    		echo 'true';
    	}
    }

    public function postRegister(Request $request) {
        $request->validate([
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
            'phone_number' => 'required',
            'establishment_name' => 'required',
            'terms' => 'required',
            'role' => 'required|in:1,3',  // Updated validation rule
            'photo_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'  // Validate photo
        ], [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'role.required' => 'Role is required',
            'role.in' => 'Invalid role selected',
            'photo_proof.image' => 'Photo must be an image',
            'photo_proof.mimes' => 'Photo must be a file of type: jpeg, png, jpg, gif',
            'photo_proof.max' => 'Photo must not exceed 2MB'
        ]);
    
        $role_id = $request->role;  // Use the numeric value directly
    
        $photo_proof = null;
        if ($request->hasFile('photo_proof')) {
            $photo_proof = $request->file('photo_proof')->store('photos', 'public'); // Save photo
        }
    
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'establishment_name' => $request->establishment_name,
            'user_role_id' => $role_id,  // Save the role ID
            'photo_proof' => $photo_proof,
            'email_verification_code' => Str::random(40),
            'invitation_token' => Str::random(40)
        ]);
    
        if ($role_id == 3) {
            $admin = User::where('user_role_id', 2)->first();
            // Return a response indicating the application is being reviewed
            return redirect()->route('getLogin')->with('success', 'Wait for admin approval');
        } else{
            // Send verification email to student
            Mail::to($request->email)->send(new EmailVerificationMail($user));

            return redirect()->back()->with('success','Registration successfull.Please check your email address for email verification link.');
        }
    }
            public function verify_email($verification_code){

                $user=User::where('email_verification_code',$verification_code)->first();
                if(!$user){
                    return redirect()->route('getRegister')->with('error','Invalid URL');
                }else{
        
                    if($user->email_verified_at){
                        return redirect()->route('getRegister')->with('error','Email already verified');
                    }else{
        
                        $user->update([
                            'email_verified_at'=>\Carbon\Carbon::now()
                        ]);
        
                        return redirect()->route('getRegister')->with('success','Email successfully verified');
        
                    }
        
                }
        
        
            }



    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:100',
            
        ]);


            $user=User::where('email',$request->email)->first();

            if(!$user){
                return redirect()->back()->with('error','Email is not registered');
            }else{

                if(!$user->email_verified_at){
                    return redirect()->back()->with('error','Email is not verified');
                }else{

                    if(!$user->is_active){
                        return redirect()->back()->with('error','User is not active. Contact admin');
                    }else{

                        $remember_me=($request->remember_me)?true:false;
                        if(auth()->attempt($request->only('email','password'),$remember_me)){

                            return redirect()->route('dashboard')->with('success','Login successfull');
                        }else{
                            return redirect()->back()->with('error','Invalid credentials');
                        }

                    }

                }

            }
         }


    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success','Logout successfull');
    }

    public function getForgetPassword(){
        return view('auth.forget_password');
    }

    public function postForgetPassword(Request $request){
        $request->validate([
         'email'=>'required|email'
        ]);

        $user=User::where('email',$request->email)->first();

        if(!$user){
            return redirect()->back()->with('error','User not found.'); 
        }else{

            $reset_code=Str::random(200);
            PasswordReset::create([
            'user_id'=>$user->id,
            'reset_code'=>$reset_code
            ]); 


            Mail::to($user->email)->send(new ForgetPasswordMail($user->first_name,$reset_code));

            return redirect()->back()->with('success','We have sent you a password reset link. Please check your email.');


        }
    }


    public function getResetPassword($reset_code){
      $password_reset_data=PasswordReset::where('reset_code',$reset_code)->first();

      if(!$password_reset_data || Carbon::now()->subMinutes(10)> $password_reset_data->created_at){
         return redirect()->route('getForgetPassword')->with('error','Invalid password reset link or link expired.');
      }else{
        return view('auth.reset_password',compact('reset_code'));
      }
    }

    public function postResetPassword($reset_code, Request $request){
      $password_reset_data=PasswordReset::where('reset_code',$reset_code)->first();
      
      if(!$password_reset_data || Carbon::now()->subMinutes(10)> $password_reset_data->created_at){
         return redirect()->route('getForgetPassword')->with('error','Invalid password reset link or link expired.');
      }else{

         $request->validate([
         'email'=>'required|email',
         'password'=>'required|min:6|max:100',
         'confirm_password'=>'required|same:password',
         ]);

         $user=User::find($password_reset_data->user_id);

         if($user->email!=$request->email){
            return redirect()->back()->with('error','Enter correct email.');
         }else{

            $password_reset_data->delete();
            $user->update([
                'password'=>bcrypt($request->password)
            ]);

            return redirect()->route('getLogin')->with('success','Password successfully reset. ');
         }
      }
    }
}