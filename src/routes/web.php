<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/articles',[ArticleController::class,'index'])->name('articles');
Route::get('/article/{article}',[ArticleController::class,'show'])->name('article.show');
Route::get('/discussions',[DiscussionController::class,'index'])->name('discussions');
Route::get('/discussion/{discussion}',[DiscussionController::class,'show'])->name('discussion.show');

