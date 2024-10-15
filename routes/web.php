<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])
        ->name('logout');

    // Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('is_super_admin')->group(function () {
        // Manage Users
    });

    // Profile Page
    Route::get('/profil-akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil-akun', [ProfileController::class, 'update'])->name('profile.update');
});
