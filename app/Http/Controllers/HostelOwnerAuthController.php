<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HostelOwner;
use Illuminate\Support\Str;
use Mail;
use App\Mail\EmailVerificationMail;
use App\PasswordReset;
use App\Mail\ForgetPasswordMail;
use Carbon\Carbon;

class HostelOwnerAuthController extends Controller
{
    public function getRegister()
    {
        return view('auth.registerH');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:hostel_owners',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password',
            'business_permit' => 'required',
        ], [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
        ]);

        $hostelOwner = HostelOwner::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'business_permit' => $request->business_permit,
            'email_verification_code' => Str::random(40)
        ]);

        Mail::to($request->email)->send(new EmailVerificationMail($hostelOwner));

        return redirect()->back()->with('success', 'Registration successful. Please check your email address for email verification link.');
    }

    public function getLogin()
    {
        return view('auth.loginH');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:100',
        ]);

        $hostelOwner = HostelOwner::where('email', $request->email)->first();

        if (!$hostelOwner) {
            return redirect()->back()->with('error', 'Email is not registered');
        } else {
            if (!$hostelOwner->email_verified_at) {
                return redirect()->back()->with('error', 'Email is not verified');
            } else {
                if (!$hostelOwner->is_active) {
                    return redirect()->back()->with('error', 'User is not active. Contact admin');
                } else {
                    $remember_me = ($request->remember_me) ? true : false;
                    if (auth()->guard('hostelOwner')->attempt($request->only('email', 'password'), $remember_me)) {
                        return redirect()->route('hostelOwnerDashboard')->with('success', 'Login successful');
                    } else {
                        return redirect()->back()->with('error', 'Invalid credentials');
                    }
                }
            }
        }
    }

    public function verify_email($verification_code)
    {
        $hostelOwner = HostelOwner::where('email_verification_code', $verification_code)->first();
        if (!$hostelOwner) {
            return redirect()->route('getRegisterH')->with('error', 'Invalid URL');
        } else {
            if ($hostelOwner->email_verified_at) {
                return redirect()->route('getRegisterH')->with('error', 'Email already verified');
            } else {
                $hostelOwner->update([
                    'email_verified_at' => \Carbon\Carbon::now()
                ]);

                return redirect()->route('getLoginH')->with('success', 'Email successfully verified');
            }
        }
    }

    public function logout()
    {
        auth()->guard('hostelOwner')->logout();
        return redirect()->route('getLoginH')->with('success', 'Logout successful');
    }

    public function getForgetPassword()
    {
        return view('auth.forget_passwordH');
    }

    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $hostelOwner = HostelOwner::where('email', $request->email)->first();

        if (!$hostelOwner) {
            return redirect()->back()->with('error', 'User not found.');
        } else {
            $reset_code = Str::random(200);
            PasswordReset::create([
                'user_id' => $hostelOwner->id,
                'reset_code' => $reset_code
            ]);

            Mail::to($hostelOwner->email)->send(new ForgetPasswordMail($hostelOwner->first_name, $reset_code));

            return redirect()->back()->with('success', 'We have sent you a password reset link. Please check your email.');
        }
    }

    public function getResetPassword($reset_code)
    {
        $password_reset_data = PasswordReset::where('reset_code', $reset_code)->first();

        if (!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at) {
            return redirect()->route('getForgetPasswordH')->with('error', 'Invalid password reset link or link expired.');
        } else {
            return view('auth.reset_passwordH', compact('reset_code'));
        }
    }

    public function postResetPassword($reset_code, Request $request)
    {
        $password_reset_data = PasswordReset::where('reset_code', $reset_code)->first();

        if (!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at) {
            return redirect()->route('getForgetPasswordH')->with('error', 'Invalid password reset link or link expired.');
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6|max:100',
                'confirm_password' => 'required|same:password',
            ]);

            $hostelOwner = HostelOwner::find($password_reset_data->user_id);

            if ($hostelOwner->email != $request->email) {
                return redirect()->back()->with('error', 'Enter correct email.');
            } else {
                $password_reset_data->delete();
                $hostelOwner->update([
                    'password' => bcrypt($request->password)
                ]);

                return redirect()->route('getLoginH')->with('success', 'Password successfully reset.');
            }
        }
    }
}
