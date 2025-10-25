<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('sign-in', [AuthController::class, 'signIn'])->name('sign.in');
Route::post('sign-in-store', [AuthController::class, 'signInStore'])->name('sign.in.store');
Route::get('sign-up', [AuthController::class, 'signUp'])->name('sign.up');
Route::post('sign-up-store', [AuthController::class, 'signUpStore'])->name('sign.up.store');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
