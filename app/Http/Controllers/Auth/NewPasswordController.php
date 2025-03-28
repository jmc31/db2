<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class NewPasswordController extends Controller
{
    public function create(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'security_question' => 'required',
            'security_answer' => 'required',
            'otp' => 'required|numeric',
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Minimum 8 characters
                    ->mixedCase() // At least 1 uppercase and 1 lowercase
                    ->letters() // Must contain letters
                    ->numbers() // Must contain numbers
                    ->symbols(), // Must contain at least 1 special character
            ],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Validate Security Question & Answer
        if ($user->security_question !== $request->security_question || !Hash::check($request->security_answer, $user->security_answer)) {
            return back()->withErrors(['security_answer' => 'Incorrect security question or answer.']);
        }

        // Validate OTP from session
        if (!Session::has('otp') || Session::get('otp') != $request->otp || Session::get('otp_email') != $user->email) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Reset Password
        $user->update(['password' => Hash::make($request->password)]);

        // Clear OTP session
        Session::forget(['otp', 'otp_email']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    public function generateOtp(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    $otp = rand(100000, 999999);
    session(['otp' => $otp, 'otp_email' => $request->email]);

    return response()->json(['otp' => $otp]);
}

}
