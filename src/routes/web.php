<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/signup', [HomeController::class,'showSignupPage'])->name('showSignup')->middleware('guest');
Route::get('/login', [HomeController::class,'showLoginPage'])->name('showLogin')->middleware('guest');
Route::post('/signup',[HomeController::class,'signup'])->name('signup')->middleware('guest');
Route::post('/login',[HomeController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout',[HomeController::class,'logout'])->name('logout')->middleware('auth');
Route::get('/password/reset',[HomeController::class,'resetPassword'])->name('password')->middleware('guest');
