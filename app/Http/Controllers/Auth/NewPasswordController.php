<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            'password' => ['required', 'confirmed', 'min:8', 'regex:/[A-Z]/', 'regex:/[\W]/'], // 1 uppercase, 1 special char
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Validate Security Question & Answer
        if ($user->security_question !== $request->security_question || !Hash::check($request->security_answer, $user->security_answer)) {
            return back()->withErrors(['security_answer' => 'Incorrect security question or answer.']);
        }

        // Validate OTP
        if (Session::get('otp') != $request->otp || Session::get('otp_email') != $user->email) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Reset Password
        $user->update(['password' => Hash::make($request->password)]);

        // Clear OTP session
        Session::forget(['otp', 'otp_email']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
