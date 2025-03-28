<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'security_question' => ['required', 'string', 'max:255'],
            'security_answer' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security_question' => $request->security_question,
            'security_answer' => Hash::make($request->security_answer),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Handle password reset via OTP & Security Question
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'security_question' => 'required',
            'security_answer' => 'required',
            'otp' => 'required',
            'password' => [
                'required', 'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->security_question !== $request->security_question) {
            return back()->withErrors(['security_question' => 'Incorrect security question.']);
        }

        // Compare hashed security answer
        if (!Hash::check($request->security_answer, $user->security_answer)) {
            return back()->withErrors(['security_answer' => 'Incorrect security answer.']);
        }

        // Verify OTP
        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Reset password
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
