<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AdminMiddleware;
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

Route::controller(IndexController::class)->group(function (){
    Route::middleware(['auth'])->group(function(){
        Route::get('/', 'index')->name('index');
    });
});

Route::controller(TaskController::class)->as('task.')->prefix('/task')->group(function (){
    Route::middleware(['auth'])->group(function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::middleware([AdminMiddleware::class])->group(function(){
            Route::get('/{task:id}/edit', 'edit')->name('edit');
            Route::post('/{task:id}/edit', 'editPost')->name('editPost');
            Route::get('/{task:id}/delete', 'delete')->name('delete');
        });
    });
    Route::get('/{task:id}', 'show')->name('show');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/signin', 'signin')->name('signin');
    Route::post('/signin', 'signinPost')->name('signinPost');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/signup', 'signupPost')->name('signupPost');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(CommentController::class)->prefix('/comments')->group(function (){
    Route::post('/create', 'store')->name('comment.create');
});
