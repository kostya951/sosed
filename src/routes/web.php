<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/signup', [HomeController::class,'showSignupPage'])->name('showSignup');
Route::get('/login', [HomeController::class,'showLoginPage'])->name('showLogin');
Route::post('/signup',[HomeController::class,'signup'])->name('signup');
Route::post('/login',[HomeController::class,'login'])->name('login');
Route::post('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/password/reset',[HomeController::class,'resetPassword'])->name('password');
