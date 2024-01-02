<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\LaporanController;
use App\Http\Controllers\Dashboard\MentorController;
use App\Http\Controllers\Dashboard\MentoringController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\BukuDigitalController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/buku-digital', [BukuDigitalController::class, 'index'])->name('buku-digital');
Route::get('/lokasi', [HomeController::class, 'lokasi'])->name('lokasi');
Route::get('/relawan', [RelawanController::class, 'index'])->name('relawan');

// Akses Mahasiswa dan Admin (Sudah Login)
Route::middleware('cek_akses:mahasiswa,admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard.index');
    Route::resource('/dashboard/e-book', BookController::class)->names('dashboard.book');

    Route::get('/buku-digital/{id}', [BukuDigitalController::class, 'show'])->name('buku-digital.show');

    Route::get('/e-book/{id}/download-file', [BookController::class, 'download_file'])->name('book.download_file');
    Route::get('/e-book/{id}/download-audio', [BookController::class, 'download_audio'])->name('book.download_audio');

    Route::post('/relawan/{id}', [RelawanController::class, 'request'])->name('relawan.request');

    Route::get('/dashboard/mentoring', [MentoringController::class, 'index'])->name('dashboard.mentoring.index');

    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::put('/dashboard/profile', [ProfileController::class, 'update'])->name('dashboard.profile.update');
});

// Akses Mahasiswa
Route::middleware('cek_akses:mahasiswa')->group(function () {

    Route::get('/dashboard/mentoring/{id}', [MentoringController::class, 'edit'])->name('dashboard.mentoring.edit');
    Route::put('/dashboard/mentoring/{id}', [MentoringController::class, 'update'])->name('dashboard.mentoring.update');
});

// Akses Admin
Route::middleware('cek_akses:admin')->group(function () {
    Route::resource('/dashboard/user', UserController::class)->names('dashboard.user');

    Route::get('/dashboard/mentor', [MentorController::class, 'index'])->name('dashboard.mentor.index');
    Route::get('/dashboard/mentor/{id}/unverify', [MentorController::class, 'unverify'])->name('dashboard.mentor.unverify');
    Route::get('/dashboard/mentor/{id}/verify', [MentorController::class, 'verify'])->name('dashboard.mentor.verify');

    Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->name('dashboard.laporan.index');
});

