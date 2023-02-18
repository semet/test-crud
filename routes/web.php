<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showForm')->name('login.show');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post/store', 'store')->name('post.store');
    Route::get('/post/edit/{post}', 'edit')->name('post.edit');
    Route::post('/post/update/{post}', 'update')->name('post.update');
    Route::get('/post/{post}/delete', 'destroy')->name('post.delete');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['admin'])->group(function () {
    Route::controller(AccountController::class)->group(function () {
        Route::get('/account', 'index')->name('account.page');
        Route::get('/account/create', 'create')->name('account.create');
        Route::post('/account', 'store')->name('account.store');
        Route::get('/account/edit/{account}', 'edit')->name('account.edit');
        Route::post('/account/update/{account}', 'update')->name('account.update');
        Route::get('/account/{account}/delete', 'destroy')->name('account.delete');
    });
});
