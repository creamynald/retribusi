<?php

use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.layouts.app');
});


Route::middleware('has.role')->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('backend.dashboard');
    });
    Route::prefix('role-and-permission')->middleware('role:super admin')->group(function () {
        Route::resource('roles', roleController::class);
        Route::resource('permissions', permissionController::class);
        Route::resource('assignable', assignController::class);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
