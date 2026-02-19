<?php

use App\Livewire\Auth\Login;
use App\Livewire\MyTheme\Studio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Guest Routes (Auth Pages)
|--------------------------------------------------------------------------
| Hanya bisa diakses ketika BELUM login
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Dashboard + App Pages)
|--------------------------------------------------------------------------
| Hanya bisa diakses setelah login
*/

Route::middleware('fake.auth')->group(function () {

    Volt::route('/dashboard', 'pages.dashboard')->name('dashboard');

    // Profile
    Volt::route('/profile', 'pages.profile')->name('profile');

    // Package
    Volt::route('/package', 'pages.package.index')->name('package.index');

    // Settings
    Volt::route('/settings', 'pages.settings')->name('settings');

    Route::prefix('my-theme')->name('my-theme.')->group(function () {
        Volt::route('/template', 'pages.my-theme.template')->name('template');
        Route::get('/studio', Studio::class)->name('studio.index');
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

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Volt::route('/index', 'pages.transaction.index')->name('index');
        Volt::route('/setting', 'pages.transaction.setting')->name('setting');
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
