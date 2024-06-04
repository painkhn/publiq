<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/new_story', [StoryController::class, 'open_new_story'])->name('OpenNewStory')->middleware(['auth']);
Route::post('/new_story', [StoryController::class, 'new_story'])->name('NewStory')->middleware(['auth']);
Route::get('/verification_list', [AdminController::class, 'verification_list'])->name('VerifList')->middleware([IsAdmin::class]);
Route::get('/verification/{story_id}/verify', [AdminController::class, 'verification_story'])->name('VerifStory')->middleware([IsAdmin::class]);
Route::get('/solution/{story_id}/{status}', [AdminController::class, 'solution'])->name('Solution')->middleware([IsAdmin::class]);

require __DIR__.'/auth.php';
