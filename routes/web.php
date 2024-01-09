<?php

use App\Http\Controllers\backend\Laporan\laporanController;
use App\Http\Controllers\backend\PemerintahDaerah\{OPDController, pemdaController, UPTController, usersController};
use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\jenisPajakDaerah\{jenRetController, objRetController};
// use App\Http\Controllers\backend\Rekening\rekController;
use App\Http\Controllers\backend\user\profileController;
use App\Http\Controllers\backend\Transaction\PenerimaanController;
use App\Http\Controllers\HomeController as DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('/login');
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

        // kode rekening
        // Route::prefix('rekening')->group(function () {
        //     Route::resource('register-rek', rekController::class);
        // });

        // jenis pajak daerah
        Route::prefix('jenis-pajak-daerah')->group(function () {
            Route::resource('retribusi', jenRetController::class);
            Route::resource('objek-retribusi', objRetController::class);
        });

        // transaksi
        Route::prefix('transaksi')->group(function () {
            Route::post('penerimaan/update-status', [PenerimaanController::class, 'updateStatus'])->name('updateStatus');
            Route::resource('penerimaan', PenerimaanController::class);
        });

        // pemerintah daerah
        Route::prefix('pemerintah-daerah')->group(function () {
            Route::resource('opd', OPDController::class);
            Route::resource('upt', UPTController::class);
            Route::resource('pengguna', usersController::class);
            Route::resource('pemda', pemdaController::class);
        });

        // laporan
        Route::prefix('laporan')->group(function () {
            Route::get('bulanan', [laporanController::class, 'monthly_report'])->name('monthly_report');
            Route::get('tahunan', [laporanController::class, 'annual_report'])->name('annual_report');
            Route::resource('harian', laporanController::class);
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
