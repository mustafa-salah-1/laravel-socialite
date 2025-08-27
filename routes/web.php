<?php

use App\Http\Controllers\ProviderGithubController;
use App\Http\Controllers\ProviderGoogleController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// github
Route::get('auth/github/redirect', [ProviderGithubController::class, 'redirect'])->name('github.redirect');
Route::get('auth/github/callback', [ProviderGithubController::class, 'callback'])->name('github.callback');

// google
Route::get('auth/google/redirect', [ProviderGoogleController::class, 'redirect'])->name('google.redirect');
Route::get('auth/google/callback', [ProviderGoogleController::class, 'callback'])->name('google.callback');

 

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
