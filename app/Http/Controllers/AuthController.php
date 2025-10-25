<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('user.login');
    }

    public function signInStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|in:on',
        ]);
        
        $credendials = $request->only('email, password');
        $remember = $request->only('remember') && $request->remember === 'on';

        // attempt Login
        if(Auth::attempt($credendials, $remember)){
            $request->session()->regenerate();

            $user = Auth::user();

             if ($user->hasRole('admin')) {
                return redirect()->back()->with('success', 'Welcome Admin!');
            } else {
                return redirect()->back()->with('success', 'Welcome!');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function signUp()
    {
        return view('user.register');
    }

    public function signUpStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,user', 
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        Auth::login($user);

        if ($user->hasRole('admin')) {
            return redirect()->route('sign.in')->with('success', 'Welcome, Admin!');
        } else {
            return redirect()->route('sign.in')->with('success', 'Welcome to your account!');
        }
    }

    public function forgotPassword()
    {
        return view('user.forgot-password');
    }
}
