<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::middleware(['role:Super Admin,Admin,Kepala Kantor,Pool'])->group(function () {
        Route::get('/log', function () {
            return view('pages.log.index');
        })->name('log.index');
        Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
        Route::put('/transaction/{id}', [TransactionController::class, 'approval'])->name('transaction.approve');
    });
    Route::middleware(['role:Super Admin,Admin,Kepala Kantor'])->group(function () {
        Route::get('/employee', function () {
            return view('pages.employee.index');
        })->name('employee.index');
    });
    Route::middleware(['role:Super Admin,Admin,Pool'])->group(function () {
        Route::get('/driver', function () {
            return view('pages.driver.index');
        })->name('driver.index');

        Route::get('/car', function () {
            return view('pages.car.index');
        })->name('car.index');
    });



});
Route::get('/dashboard', function () {

    return view('pages.home');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
