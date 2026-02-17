<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Guest Routes (Auth Pages)
|--------------------------------------------------------------------------
| Hanya bisa diakses ketika BELUM login
*/

Route::middleware('fake.auth')->group(function () {
    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/register', 'auth.register')->name('register');
});

// ========== AUTHENTICATED AREA ==========
// Route::middleware('fake.auth')->group(function () {
//     Volt::route('/dashboard', 'pages.dashboard')->name('dashboard');
// });

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard + App Pages)
|--------------------------------------------------------------------------
| Hanya bisa diakses setelah login
*/

Route::middleware('fake.auth')->group(function () {

  Volt::route('/dashboard', 'pages.dashboard')->name('dashboard');

    Route::prefix('my-theme')->name('my-theme.')->group(function () {
        Volt::route('/template', 'pages.my-theme.template')->name('template');
        Volt::route('/studio', 'pages.my-theme.studio')->name('studio');
    });

    Route::prefix('tamu')->name('tamu.')->group(function () {
        Volt::route('/index', 'pages.tamu.index')->name('index');
        Volt::route('/rsvp', 'pages.tamu.rsvp')->name('rsvp');
        Volt::route('/ucapan', 'pages.tamu.ucapan')->name('ucapan');
    });

    Route::prefix('egift')->name('egift.')->group(function () {
        Volt::route('/index', 'pages.egift.index')->name('index');
        Volt::route('/setting', 'pages.egift.setting')->name('setting');
    });
    /*
    |-------------------------
    | Logout
    |-------------------------
    */
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

});
