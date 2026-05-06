<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ExploreController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::resource('/monsters', MonsterController::class)->middleware('auth');
Route::resource('/types', TypeController::class)->middleware('auth');
Route::resource('/moves', MoveController::class)->middleware('auth');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
Route::get('/explore/{user}', [ExploreController::class, 'monsters'])->name('explore.monsters');

require __DIR__.'/auth.php';
