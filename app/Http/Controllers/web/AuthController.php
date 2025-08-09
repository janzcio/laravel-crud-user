<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            $user = Auth::user();
            // Create a token for the user
            $token = $user->createToken('LaravelCrudUser')->plainTextToken;

            // Store the token in the session (if needed) or return it in the response
            session(['token' => $token]); // Optional: Store token in session

            return redirect()->route('dashboard'); // Redirect to the dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Revoke all tokens for the user
            $user->tokens()->delete(); // This will revoke all tokens for the user

            // Log the user out
            Auth::logout();

            // Optionally, invalidate the session if you're using it
            $request->session()->invalidate();

            // Regenerate the session token to prevent session fixation attacks
            $request->session()->regenerateToken();
        }

        return redirect()->route('login')->with('success', 'You have been logged out successfully.'); // Redirect to the login page
    }
}
