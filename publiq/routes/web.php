<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

require __DIR__.'/auth.php';
