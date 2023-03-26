<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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
//careers
Route::get('/careers', [PublicController::class, 'careers'])->name('careers')->middleware('auth');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit')->middleware('auth');


//ARTICLE CONTROLLER
Route::resource('articles', ArticleController::class);
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');
Route::get('/article/auth', [ArticleController::class, 'ArticleAuth'])->name('articles.auth');
Route::get('/article/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');


//ADMIN CONTROLLER
Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // admin 
    Route::get('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/admin/{user}/reject-admin', [AdminController::class, 'rejectAdmin'])->name('admin.rejectAdmin');

    // revisor
    Route::get('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/admin/{user}/reject-revisor', [AdminController::class, 'rejectRevisor'])->name('admin.rejectRevisor');

    //writer
    Route::get('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::get('/admin/{user}/reject-writer', [AdminController::class, 'rejectWriter'])->name('admin.rejectWriter');

    //tags
    Route::put('/admin/edit/{tag}/tag', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');

    //categorie
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});


//REVISOR CONTROLLER
Route::middleware(['revisor', 'verified'])->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');

    // accept
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');

    // reject
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');

    // undo
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

//SCOUT
Route::get('\article\search', [ArticleController::class, 'articleSearch'])->name('article.search');
