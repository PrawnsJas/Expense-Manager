<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return inertia('Login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // If successful, redirect to intended page or home
            return redirect()->intended('/home'); // Change '/home' to your intended route
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Log the user out
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect('/login'); // Redirect to the login page
    }
}
