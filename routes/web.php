<?php

use App\Livewire\EditBook;
use App\Livewire\NewBook;
use App\Livewire\ShowBook;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('home');
Route::get('/book/{book}', ShowBook::class)->name('book');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/book', NewBook::class)->name('book.new');
    Route::get('/book/{id}/edit', EditBook::class)->name('book.edit');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
