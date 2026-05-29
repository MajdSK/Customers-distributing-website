<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function openSignUpPage()
    {
        return view("Auth/SignUp");
    }
    public function openLogInPage()
    {
        return view("Auth/LogIn");
    }
    public function signUpNewUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', Password::default()],
        ]);
        $user = User::create([
            "name" => request('name'),
            "email" => request("email"),
            'password' => Hash::make(request("password")),
            "email_verified_at" => now(),
            "created_at" => now(),
            "updated_at" => now(),
            "remember_token" => "",
        ]);
        Auth::login($user);
        return redirect("/");
    }
    public function logInUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email' => "The provided credentials do not match our records."])->onlyInput('email');
    }
    public function logoutUser()
    {
        Auth::logout();
        return redirect('/');
    }
}