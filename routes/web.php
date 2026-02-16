<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::resource('/login', LoginController::class)->only('index', 'store');
    Route::resource('/register', RegisterController::class)->only('index', 'store');
});

Route::middleware(['tenant', 'ensureTenant', 'auth'])->group(function(){
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('/', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    Route::resource('/workspace', WorkspaceController::class)->only('index', 'show');

});

