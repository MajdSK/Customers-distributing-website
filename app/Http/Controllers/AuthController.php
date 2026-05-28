<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function openSignUpPage(){
        return view("SignUp");
    }
    public function openLogInPage(){
        return view("LogIn");
    }
    public function signUpNewUser(Request $request){
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:Users,email'],
            'password' => ['required', Password::default()],
        ]);
        $user = User::create([
            "name" => request('name'),
            "email" => request("email"),
            'password' => Hash::make(request("password")),
            "email_verified_at" => now(),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        Auth::login($user);
        return redirect("/");
    }
    public function logInUser(Request $request){
        if(Auth::attempt($request->validate([
            'email' => ['required','email', 'unique:Users,email'],
            'password' => ['required'],
        ])) && User::where('email', request("email"))->exists()){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => "invalid credentials", 'password' => "invalid password"]);
    }
}