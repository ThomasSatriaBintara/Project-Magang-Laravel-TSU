<?php

use Illuminate\Support\Facades\Route;

// AUTH & LANDING (Public)
Route::get('/', function () { return view('layouts.landing'); })->name('landing');
Route::get('/login', function () { return view('layouts/auth.login'); })->name('login');
Route::get('/register', function () { return view('layouts/auth.register'); })->name('register');

// Forgot Password
Route::prefix('password')->group(function () {
    Route::get('/', function () { return view('layouts.auth.forgot.password'); })->name('password.request');
    Route::get('/otp', function () { return view('layouts.auth.forgot.password-otp'); })->name('password.otp');
    Route::get('/reset', function () { return view('layouts.auth.forgot.password-reset'); })->name('password.reset');
});

//ROLE MAHASISWA
Route::prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', function () { return view('mahasiswa.dashboard.dashboard'); })->name('mahasiswa.dashboard');
    Route::get('/program', function () { return view('mahasiswa.program.program'); })->name('mahasiswa.program');
    Route::get('/program/detail/{id}', function ($id) { return view('mahasiswa.program.program-detail', compact('id')); })->name('mahasiswa.program.detail');
    Route::get('/logbook', function () { return view('mahasiswa.logbook.logbook'); })->name('mahasiswa.logbook');
    Route::get('/penilaian', function () { return view('mahasiswa.penilaian.penilaian'); })->name('mahasiswa.penilaian');
    Route::get('/pembimbing', function () { return view('mahasiswa.pembimbing.pembimbing'); })->name('mahasiswa.pembimbing');
    Route::get('/setting', function () { return view('layouts.setting'); })->name('mahasiswa.setting');
});

//ROLE DOSEN
Route::prefix('dosen')->group(function () {
    Route::get('/dashboard', function () { return view('dosen.dashboard'); })->name('dosen.dashboard');
    Route::get('/logbook', function () { return view('dosen.logbook'); })->name('dosen.logbook');
    Route::get('/penilaian', function () { return view('dosen.penilaian'); })->name('dosen.penilaian'); // Persiapan
    Route::get('/setting', function () { return view('layouts.setting'); })->name('dosen.setting');
});

//ROLE ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
});