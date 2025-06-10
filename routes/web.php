<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::view('/sign-in-advance', 'sign-in-advance')->name('sign-in-advance');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Livewire\Home::class)->name('home');
    Route::get('/my-profile', \App\Livewire\MyProfile::class)->name('myProfile');
    Route::get('/settings', \App\Livewire\Settings::class)->name('settings');
    Route::get('/post-details/{idPost}', \App\Livewire\PostDetails::class)->name('post-details');

/*    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');*/
});

require __DIR__.'/auth.php';
