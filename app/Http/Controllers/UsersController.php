<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function vUserHome(User $user)
    {
        return view("User", ["user" => $user, "customers"=> $user->customers]);
    }
    public function makeAvailable( User $user)
    {
        $user->update(['availability'=>!$user->availability]);
        return redirect()->back();
    }
    public function doneTasksUser(User $user){
        return view("Verified_user/Done", ["doneTasks" => $user->customers()->where('visited', true)->get()]);
    }
    public function pendingTasksUser(User $user){
        return view("Verified_user/Pending", ["pendingTasks" => $user->customers()->where('visited', false)->get()]);
    }
    public function showProfUser(User $user){
        return view('Verified_user/Profile', ['user' => $user]);
    }

    private function getAllUsers()
    {
        return User::all();
    }
    public function adminUsersPage()
    {
        return view("Admins/users", ["users" => $this->getAllUsers()]);
    }

    public function makeAdmin(User $user)
    {
        $user->update(['is_admin'=>!$user->is_admin]);
        return redirect()->back();
    }
    public function verify(User $user)
    {
        $user->update(['verified'=>!$user->verified]);
        return redirect()->back();
    }
    public function destroyUser()
    {
        User::where("id", request("delUserId"))->first()->delete();
        return redirect()->back();
    }
    public function doneTasksAdmin(){
        return view("Verified_user/Done", ["doneTasks" => Customer::where('visited', true)->get()]);
    }
    public function pendingTasksAdmin(){
        return view("Verified_user/Pending", ["pendingTasks" => Customer::where('visited', false)->get()]);
    }
}