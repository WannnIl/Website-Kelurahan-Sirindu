<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\OfficialController;
use App\Http\Controllers\Admin\PotentialController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\LingkunganController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/sotk', [HomeController::class, 'sotk'])->name('sotk');
Route::get('/lingkungan', [HomeController::class, 'lingkungan'])->name('lingkungan');
Route::get('/potensi', [HomeController::class, 'potensi'])->name('potensi');
Route::get('/kkn', [HomeController::class, 'kkn'])->name('kkn');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [HomeController::class, 'beritaShow'])->name('berita.show');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('profiles', ProfileController::class);
    Route::resource('officials', OfficialController::class);
    Route::resource('potentials', PotentialController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('agendas', AgendaController::class);
    Route::resource('lingkungan', LingkunganController::class);
});
