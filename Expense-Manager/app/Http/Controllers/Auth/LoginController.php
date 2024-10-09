<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log; 

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
            $user = Auth::user(); // Get the authenticated user

            // Store the user's role in the session
            session(['user_role' => $user->role->name]); // Assuming the role is accessible via the relationship

            // If successful, redirect to intended page or home
            return redirect()->intended('/dashboard'); // Change '/dashboard' to your intended route
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();
    
        // Log the action
        Log::info('User logged out.', [
            'user_id' => Auth::id(), // This will be null since the user is logged out
            'timestamp' => now(),
        ]);
    
        // Clear the user role from the session
        session()->forget('user_role');
    
        // Log that the user role has been cleared
        Log::info('User role cleared from session.');
    
        // Redirect to the login page
        return redirect('/login');
    }
}
