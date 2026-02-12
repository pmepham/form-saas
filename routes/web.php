<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/login', function () {
        return view('auth.login');
    })->name('dashboard');
});

Route::middleware(['tenant', 'ensureTenant', 'auth'])->group(function(){
    Route::get('/', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
});

