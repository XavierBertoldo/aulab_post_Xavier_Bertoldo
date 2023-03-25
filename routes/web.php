<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//PUBLIC CONTROLLER
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');


//ARTICLE CONTROLLER
Route::resource('articles', ArticleController::class);
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');
Route::get('/article/auth', [ArticleController::class, 'ArticleAuth'])->name('articles.auth');
Route::get('/article/{user}',[ArticleController::class,'byUser'])->name('article.byUser');

