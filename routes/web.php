<?php

use Illuminate\Support\Facades\Route;

//landing
Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

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

Route::get('/program', function () {
    return view('pages/program.program');
})->name('program');

Route::get('/program/detail/{id}', function ($id) {
    return view('pages/program.program-detail', compact('id')); 
})->name('program.detail');

Route::get('/logbook', function () {
    return view('pages/logbook.logbook');
})->name('logbook');

Route::get('/penilaian', function () {
    return view('pages/penilaian.penilaian'); 
})->name('penilaian');

Route::get('/pembimbing', function () {
    return view('pages/pembimbing.pembimbing');
})->name('pembimbing');

//setting
Route::get('/setting', function () {
    return view('/pages.setting');
})->name('setting');