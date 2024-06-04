<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/profile', [ProfileController::class, 'profile'])->name('Profile')->middleware(['auth']);
Route::post('/profile/edit', [ProfileController::class, 'edit_user'])->name('EditUser')->middleware(['auth']);

Route::get('/story/new', [StoryController::class, 'open_new_story'])->name('OpenNewStory')->middleware(['auth']);
Route::post('/story/new', [StoryController::class, 'new_story'])->name('NewStory')->middleware(['auth']);
Route::get('/story/{id}', [StoryController::class, 'show_story'])->name('Story');
Route::get('/story/edit/{id}', [StoryController::class, 'editor_story'])->name('EditStory')->middleware(['auth']);
Route::post('/story/edit/{id}', [StoryController::class, 'edit_story'])->name('EditStory')->middleware(['auth']);

Route::get('/verification/list', [AdminController::class, 'verification_list'])->name('VerifList')->middleware([IsAdmin::class]);
Route::get('/verification/{story_id}/verify', [AdminController::class, 'verification_story'])->name('VerifStory')->middleware([IsAdmin::class]);
Route::get('/solution/{story_id}/{status}', [AdminController::class, 'solution'])->name('Solution')->middleware([IsAdmin::class]);

require __DIR__.'/auth.php';
