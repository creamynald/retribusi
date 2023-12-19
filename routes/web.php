<?php

use App\Http\Controllers\backend\PemerintahDaerah\{PangkatController, JabatanController, OPDController, UPTController, usersController};
use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\user\profileController;
use App\Http\Controllers\backend\Transaction\PenerimaanController;
use App\Http\Controllers\HomeController as DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.layouts.app');
});

Route::middleware('has.role')
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // role and permission
        Route::prefix('role-and-permission')
            ->middleware('permission:permission')
            ->group(function () {
                Route::resource('roles', roleController::class);
                Route::resource('permissions', permissionController::class);
                Route::resource('assignable', assignController::class);
                Route::resource('assign/user', userController::class);
            });

        // user profile
        Route::prefix('user')->group(function () {
            Route::resource('profile', profileController::class);
        });

        // transaksi
        Route::prefix('transaksi')->group(function () {
            Route::post('penerimaan/update-status', [PenerimaanController::class, 'updateStatus'])->name('updateStatus');
            Route::resource('penerimaan', PenerimaanController::class);
        });

        // pemerintah daerah
        Route::prefix('pemerintah-daerah')->group(function () {
            Route::resource('pangkat', PangkatController::class);
            Route::resource('jabatan', JabatanController::class);
            Route::resource('opd', OPDController::class);
            Route::resource('upt', UPTController::class);
            Route::resource('pengguna', usersController::class);
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
