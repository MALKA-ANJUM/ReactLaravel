<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('sign-in', [AuthController::class, 'signIn'])->name('sign.in');
Route::post('sign-in-store', [AuthController::class, 'signInStore'])->name('sign.in.store');
Route::get('sign-up', [AuthController::class, 'signUp'])->name('sign.up');
Route::post('sign-up-store', [AuthController::class, 'signUpStore'])->name('sign.up.store');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');

Route::middleware('auth')->group(function(){
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });

    Route::middleware('role:user')->prefix('user')->name('user.')->group(function(){
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});
