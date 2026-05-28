<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function(){
    Route::get("/User" , [UsersController::class , "show"])->name("User.show");
}
);
Route::middleware("admin")->group(function(){
});

Route::middleware("verified")->group(function(){
    Route::get("/User" , [UsersController::class , "show"])->name("User.show");
});

Route::middleware("guest")->group(function(){
    Route::get("/LogIn", [AuthController::class, "openLogInPage"] );
    Route::get("/SignUp", [AuthController::class, "openSignUpPage"] );
    Route::post("/SignUp" , [AuthController::class, "signUpNewUser"]);
    Route::post("/LogIn" , [AuthController::class, "logInUser"]);
});