<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Guest routes (login/register - accessible only when NOT logged in)
Route::middleware('guest')->group(function () {
    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/register', 'auth.register')->name('register');
});

// Authenticated routes (dashboard & protected pages)
// Route::middleware('auth')->group(function () {
// Dashboard Utama
Volt::route('/dashboard', 'pages.dashboard')->name('dashboard');

// My Theme Group
Route::prefix('my-theme')->name('my-theme.')->group(function () {
    Volt::route('/template', 'pages.my-theme.template')->name('template');
    Volt::route('/studio', 'pages.my-theme.studio')->name('studio');
});

// Tamu Undangan Group
Route::prefix('tamu')->name('tamu.')->group(function () {
    Volt::route('/index', 'pages.tamu.index')->name('index');
    Volt::route('/rsvp', 'pages.tamu.rsvp')->name('rsvp');
    Volt::route('/ucapan', 'pages.tamu.ucapan')->name('ucapan');
});

// E-Gift Group
Route::prefix('egift')->name('egift.')->group(function () {
    Volt::route('/index', 'pages.egift.index')->name('index');
    Volt::route('/setting', 'pages.egift.setting')->name('setting');
    Volt::route('/payout', 'pages.egift.payout')->name('payout');
});

// Transaction
Volt::route('/transaction', 'pages.transaction.index')->name('transaction');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
// });
