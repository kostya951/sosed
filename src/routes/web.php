<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/signup', [HomeController::class,'showSignupPage'])->name('showSignup')->middleware('guest');
Route::get('/login', [HomeController::class,'showLoginPage'])->name('showLogin')->middleware('guest');

require_once __DIR__ . '/auth.php';
