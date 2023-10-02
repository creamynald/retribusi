<?php

use App\Http\Controllers\backend\permissions\roleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $role = Role::find(2);
    // $role->givePermissionto('create post', 'delete post');
    return view('frontend.layouts.app');
});


Route::middleware('has.role')->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('backend.dashboard');
    });
    Route::prefix('role-and-permission')->group(function () {
        Route::resource('roles', roleController::class);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
