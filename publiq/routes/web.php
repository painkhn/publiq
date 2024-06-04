<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/new_story', [StoryController::class, 'open_new_story'])->name('OpenNewStory')->middleware(['auth']);
Route::post('/new_story', [StoryController::class, 'new_story'])->name('NewStory')->middleware(['auth']);

require __DIR__.'/auth.php';
