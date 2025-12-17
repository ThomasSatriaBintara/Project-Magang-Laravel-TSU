<?php

use Illuminate\Support\Facades\Route;

//landing
Route::get('/', function () {
    return view('pages.landing');
})->name('landing'); // Tambahkan nama untuk landing page

//auth
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//forgot
Route::get('/password', function () {
    return view('forgot.password');
})->name('password.request');

Route::get('/password-otp', function () {
    return view('forgot.password-otp');
})->name('password.otp');

Route::get('/password-reset', function () {
    return view('forgot.password-reset');
})->name('password.reset');

//main
Route::get('/dashboard', function () {
    return view('pages/dashboard.dashboard');
})->name('dashboard');

Route::get('/dashboard/detail/{id}', function ($id) {
    return view('pages./dashboard.dashboard-detail', compact('id')); 
})->name('dashboard.detail');

Route::get('/logbook', function () {
    return view('pages/logbook.logbook');
})->name('logbook');

Route::get('/penilaian', function () {
    return view('pages.penilaian'); 
})->name('penilaian');

Route::get('/pembimbing', function () {
    return view('pages.pembimbing');
})->name('pembimbing');