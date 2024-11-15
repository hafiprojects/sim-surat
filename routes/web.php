<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentInController;
use App\Http\Controllers\DocumentOutController;
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

# Auth routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'destroy'])
        ->name('logout');

    # Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('is_super_admin')->group(function () {
        # Manage User Page
        Route::get('/manajemen-akun', [ManageUserController::class, 'index'])->name('users-management.index');
        Route::get('/manajemen-akun/tambah', [ManageUserController::class, 'create'])->name('users-management.create');
        Route::post('/manajemen-akun', [ManageUserController::class, 'store'])->name('users-management.store');
        Route::get('/manajemen-akun/{id}/edit', [ManageUserController::class, 'edit'])->name('users-management.edit');
        Route::put('/manajemen-akun/{id}', [ManageUserController::class, 'update'])->name('users-management.update');
        Route::delete('/manajemen-akun/{id}', [ManageUserController::class, 'destroy'])->name('users-management.destroy');
        Route::post('/manajemen-akun/{id}/disable', [ManageUserController::class, 'disable'])->name('users-management.disable');
    });

    # Manage Jenis Surat
    Route::get('/jenis-surat', [DocumentTypeController::class, 'index'])->name('doc-types-management.index');
    Route::post('/jenis-surat', [DocumentTypeController::class, 'store'])->name('doc-types-management.store');
    Route::put('/jenis-surat/{id}', [DocumentTypeController::class, 'update'])->name('doc-types-management.update');
    Route::delete('/jenis-surat/{id}', [DocumentTypeController::class, 'destroy'])->name('doc-types-management.destroy');

    # Surat Masuk Sekretariat
    Route::get('/sekretariat/surat-masuk', [DocumentInController::class, 'index_doc_sekretariat'])->name('doc-sekretariat-in.index');
    Route::get('/sekretariat/surat-masuk/tambah', [DocumentInController::class, 'create_doc_sekretariat'])->name('doc-sekretariat-in.create');
    Route::post('/sekretariat/surat-masuk', [DocumentInController::class, 'store_doc_sekretariat'])->name('doc-sekretariat-in.store');
    Route::get('/sekretariat/surat-masuk/{id}', [DocumentInController::class, 'show_doc'])->name('doc-sekretariat-in.show');
    Route::get('/sekretariat/surat-masuk/{id}/edit', [DocumentInController::class, 'edit_doc_sekretariat'])->name('doc-sekretariat-in.edit');
    Route::put('/sekretariat/surat-masuk/{id}', [DocumentInController::class, 'update_doc_sekretariat'])->name('doc-sekretariat-in.update');
    Route::delete('/sekretariat/surat-masuk/{id}', [DocumentInController::class, 'destroy_doc_sekretariat'])->name('doc-sekretariat-in.destroy');

    # Surat Masuk Bidang Pemuda
    Route::get('/pemuda/surat-masuk', [DocumentInController::class, 'index_doc_bidang_pemuda'])->name('doc-pemuda-in.index');
    Route::get('/pemuda/surat-masuk/tambah', [DocumentInController::class, 'create_doc_bidang_pemuda'])->name('doc-pemuda-in.create');
    Route::post('/pemuda/surat-masuk', [DocumentInController::class, 'store_doc_bidang_pemuda'])->name('doc-pemuda-in.store');
    Route::get('/pemuda/surat-masuk/{id}', [DocumentInController::class, 'show_doc'])->name('doc-pemuda-in.show');
    Route::get('/pemuda/surat-masuk/{id}/edit', [DocumentInController::class, 'edit_doc_bidang_pemuda'])->name('doc-pemuda-in.edit');
    Route::put('/pemuda/surat-masuk/{id}', [DocumentInController::class, 'update_doc_bidang_pemuda'])->name('doc-pemuda-in.update');
    Route::delete('/pemuda/surat-masuk/{id}', [DocumentInController::class, 'destroy_doc_bidang_pemuda'])->name('doc-pemuda-in.destroy');

    # Surat Masuk Bidang Olahraga
    Route::get('/olahraga/surat-masuk', [DocumentInController::class, 'index_doc_bidang_olahraga'])->name('doc-olahraga-in.index');
    Route::get('/olahraga/surat-masuk/tambah', [DocumentInController::class, 'create_doc_bidang_olahraga'])->name('doc-olahraga-in.create');
    Route::post('/olahraga/surat-masuk', [DocumentInController::class, 'store_doc_bidang_olahraga'])->name('doc-olahraga-in.store');
    Route::get('/olahraga/surat-masuk/{id}', [DocumentInController::class, 'show_doc'])->name('doc-olahraga-in.show');
    Route::get('/olahraga/surat-masuk/{id}/edit', [DocumentInController::class, 'edit_doc_bidang_olahraga'])->name('doc-olahraga-in.edit');
    Route::put('/olahraga/surat-masuk/{id}', [DocumentInController::class, 'update_doc_bidang_olahraga'])->name('doc-olahraga-in.update');
    Route::delete('/olahraga/surat-masuk/{id}', [DocumentInController::class, 'destroy_doc_bidang_olahraga'])->name('doc-olahraga-in.destroy');

    # Surat Keluar
    Route::get('/surat-keluar', [DocumentOutController::class, 'index'])->name('doc-out.index');
    Route::get('/surat-keluar/tambah', [DocumentOutController::class, 'create'])->name('doc-out.create');
    Route::post('/surat-keluar', [DocumentOutController::class, 'store'])->name('doc-out.store');
    Route::get('/surat-keluar/{id}', [DocumentOutController::class, 'show'])->name('doc-out.show');
    Route::get('/surat-keluar/{id}/edit', [DocumentOutController::class, 'edit'])->name('doc-out.edit');
    Route::put('/surat-keluar/{id}', [DocumentOutController::class, 'update'])->name('doc-out.update');
    Route::delete('/surat-keluar/{id}', [DocumentOutController::class, 'destroy'])->name('doc-out.destroy');

    // Profile Page
    Route::get('/profil-akun', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil-akun', [ProfileController::class, 'update'])->name('profile.update');
});
