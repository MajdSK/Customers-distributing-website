<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function unVerUserHome()
    {
        $user = User::where("id", Auth::user()->id)->first();
        return view("Unverified_users/Index", ["user" => $user]);
    }
    public function vUserHome()
    {
        $user = User::where("id", Auth::user()->id)->first();
        return view("Verified_users/Index", ["user" => $user, "customers" => $user->customers]);
    }
    public function makeAvailable(User $user)
    {
        $user->update(['availability' => !$user->availability]);
        return redirect()->back();
    }
    public function doneTasksUser()
    {
        $user = User::where("id", Auth::user()->id)->first();
        return view("Verified_users/Done", ["customers" => $user->customers()->where('visited', true)->get()]);
    }
    public function pendingTasksUser()
    {
        $user = User::where("id", Auth::user()->id)->first();
        return view("Verified_users/Pending", ["customers" => $user->customers()->where('visited', false)->get()]);
    }
    public function showProfUser()
    {
        $user = User::where("id", Auth::user()->id)->first();
        return view('/Profile', ['user' => $user]);
    }


    public function adminHome()
    {
        return view("Admins/Index", ["users" => User::all(), "customers" => Customer::all()]);
    }
    public function adminUsersPage()
    {
        return view("Admins/Users", ["users" => User::all()]);
    }
    public function doneTasksAdmin()
    {
        return view("Admins/Done", ["customers" => Customer::where('visited', true)->get()]);
    }
    public function pendingTasksAdmin()
    {
        return view("Admins/Pending", ["customers" => Customer::where('visited', false)->get()]);
    }

    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => !$user->is_admin]);
        return redirect()->back();
    }
    public function verify(User $user)
    {
        $user->update(['verified' => !$user->verified]);
        return redirect()->back();
    }
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}