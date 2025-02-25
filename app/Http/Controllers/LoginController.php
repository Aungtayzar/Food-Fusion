<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function login(): View {
        return view('auth.login');
    }

    public function authenticate(Request $request):string {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $throttleKey = 'login:' . $request->ip(); // login:127.0.0.1
        $maxAttempts = 3;
        $lockoutTime = 180; // 3 minutes in seconds

        //check user attempt exceed
        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            return back()->withErrors([
                'email' => "Too many login attempts. Please try again in $seconds seconds.",
            ])->onlyInput('email');
            
        }

         // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            RateLimiter::clear($throttleKey);

            // Redirect to the intended route or a default route
            return redirect()->intended(route('home'))->with('success', 'You are now logged in!');
        }   

        
        RateLimiter::hit($throttleKey, $lockoutTime);

        $attemptsLeft = max(0, $maxAttempts - RateLimiter::attempts($throttleKey));

        return back()->withErrors([
            'email' => "The provided credentials do not match.You have $attemptsLeft attempts left.",
        ])->onlyInput('email');
    }

    public function logout(Request $request):RedirectResponse{
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/');
    }
}
