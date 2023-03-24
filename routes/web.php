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
Route::resource('articles', ArticleController::class)->middleware('auth')->except('index', 'show');
