<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UsersController::class, 'showProfUser'])->name('profile.show');
    Route::post('/Logout', [AuthController::class, 'logoutUser']);
});

Route::middleware(['auth', 'unverified'])->group(
    function () {
        Route::get('/UnverifiedUser', [UsersController::class, 'unVerUserHome'])->name('UVuser_homepage.show');
    }
);
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/Admin/All-Users', [UsersController::class, 'adminUsersPage'])->name('all_users.show');
    Route::get('/Admin/all-pending-tasks', [UsersController::class, 'pendingTasksAdmin'])->name('all_pending_tasks.show');
    Route::get('/Admin/all-done-tasks', [UsersController::class, 'doneTasksAdmin'])->name('all_done_tasks.show');
    Route::get('/AdminUser', [UsersController::class, 'adminHome'])->name('admin_homepage.show');
    Route::get('/Admin/User/{user}/todaysTasks', [UsersController::class, 'ShowUsersDoneTasksDaily']);
    Route::get('/Admin/User/{user}/AllTimeTasks', [UsersController::class, 'ShowUsersDoneTasksAllTime']);

    Route::patch('/Admin/Users/MakeAdmin/{user}', [UsersController::class, 'makeAdmin']);
    Route::patch('/Admin/Users/Verify/{user}', [UsersController::class, 'verify']);
    Route::delete('/Admin/Users/Destroy/{user}', [UsersController::class, 'destroyUser']);
    Route::patch('/Admin/Customer/MarkVisited/{customer}', [CustomerController::class, 'MakeVisited']);
    Route::post("/addNewCustomer", [CustomerController::class, "importExcelToCustomerController"]);
    Route::delete('/Customer/Drop/{customer}', [CustomerController::class, "DelCustomer"]);

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/VUser', [UsersController::class, 'vUserHome'])->name('Vuser_homepage.show');
    Route::get('/VUser/pending-tasks', [UsersController::class, 'pendingTasksUser'])->name('user_pending_tasks.show');
    Route::get('/VUser/done-tasks', [UsersController::class, 'doneTasksUser'])->name('user_done_tasks.show');
    Route::patch('/VUser/makeAvailable/{user}', [UsersController::class, 'makeAvailable']);
    Route::patch('/MakeAvailable/{user}', [UsersController::class, "makeAvailable"]);
    Route::patch('/Customer/MarkVisited/{customer}', [CustomerController::class, 'MakeVisited']);
    Route::delete('/Customer/Drop/{customer}', [CustomerController::class, "DropCustomer"]);
});

Route::middleware('guest')->group(function () {
    Route::get('/LogIn', [AuthController::class, 'openLogInPage']);
    Route::get('/SignUp', [AuthController::class, 'openSignUpPage']);
    Route::post('/SignUp', [AuthController::class, 'signUpNewUser']);
    Route::post('/LogIn', [AuthController::class, 'logInUser']);
    Route::get('/welcome', function () {
        return view('welcome');
    });
});

Route::get('/', function () {
    if (!Auth::check())
        return redirect('/welcome');
    else if (Auth::check() && !Auth::user()->verified)
        return redirect('/UnverifiedUser');
    else if (Auth::check() && Auth::user()->verified && !Auth::user()->is_admin)
        return redirect('/VUser');
    else if (Auth::check() && Auth::user()->verified && Auth::user()->is_admin)
        return redirect('/AdminUser');
});