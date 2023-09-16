<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        // Validation
       $data = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid syntax for your email.',
            'password.required' => 'Please enter your password!'
        ]);

        // Check if the credentials are correct
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        // In case of wrong credentials
        return back()->with('error', 'The provided credentials do not match our records.');
    }
}
