<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/articles',[ArticleController::class,'index'])->name('articles');
Route::get('/article/{article}',[ArticleController::class,'show'])->name('article.show');
Route::get('/discussions',[DiscussionController::class,'index'])->name('discussions');
Route::get('/discussion/{discussion}',[DiscussionController::class,'show'])->name('discussion.show');
Route::get('/discussions/search',[DiscussionController::class,'search'])->name('discussions.search');
Route::get('/discussions/filter',[DiscussionController::class,'filter'])->name('discussions.filter');
Route::get('/user/{user}', [UserController::class,'profile'])->name('user.profile');
