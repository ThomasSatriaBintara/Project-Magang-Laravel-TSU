<?php

use Illuminate\Support\Facades\Route;

//landing
Route::get('/', function () {
    return view('layouts.landing');
})->name('landing');

//auth
Route::get('/register', function () {
    return view('layouts/auth.register');
})->name('register');

Route::get('/login', function () {
    return view('layouts/auth.login');
})->name('login');

//forgot
Route::get('/password', function () {
    return view('layouts/auth/forgot.password');
})->name('password.request');

Route::get('/password-otp', function () {
    return view('layouts/auth/forgot.password-otp');
})->name('password.otp');

Route::get('/password-reset', function () {
    return view('layouts/auth/forgot.password-reset');
})->name('password.reset');

//main
Route::get('/dashboard', function () {
    return view('mahasiswa/dashboard.dashboard');
})->name('dashboard');

Route::get('/program', function () {
    return view('mahasiswa/program.program');
})->name('program');

Route::get('/program/detail/{id}', function ($id) {
    return view('mahasiswa/program.program-detail', compact('id')); 
})->name('program.detail');

Route::get('/logbook', function () {
    return view('mahasiswa/logbook.logbook');
})->name('logbook');

Route::get('/penilaian', function () {
    return view('mahasiswa/penilaian.penilaian'); 
})->name('penilaian');

Route::get('/pembimbing', function () {
    return view('mahasiswa/pembimbing.pembimbing');
})->name('pembimbing');

//setting
Route::get('/setting', function () {
    return view('/layouts.setting');
})->name('setting');