<?php

use App\Http\Controllers\{HomeController, CategoryController, ProfileController, StoryController, AdminController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    // Route::get('/catalog', 'catalog')->name('Catalog');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile', 'profile')->name('Profile')->middleware(['auth']);
    Route::post('/profile/edit', 'edit_user')->name('EditUser')->middleware(['auth']);
});

Route::controller(StoryController::class)->group(function() {
    Route::get('/catalog', 'index')->name('Catalog');
    Route::get('/story/new', 'open_new_story')->name('OpenNewStory')->middleware(['auth']);
    Route::post('/story/new', 'new_story')->name('NewStory')->middleware(['auth']);
    Route::get('/story/{id}', 'show_story')->name('Story')->middleware(['auth']);
    Route::get('/story/edit/{id}', 'editor_story')->name('EditStory')->middleware(['auth']);
    Route::post('/story/edit/{id}', 'edit_story')->name('EditStory')->middleware(['auth']);
    Route::post('/stories/{id}/like', 'likeStory')->name('story.like');
    Route::post('/stories/{id}/comment', 'commentStory')->name('story.comment');
});

Route::middleware(IsAdmin::class)->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/verification/list', 'verification_list')->name('VerifList')->middleware([IsAdmin::class]);
        Route::get('/verification/{story_id}/verify', 'verification_story')->name('VerifStory')->middleware([IsAdmin::class]);
        Route::get('/solution/{story_id}/{status}', 'solution')->name('Solution')->middleware([IsAdmin::class]);
        Route::get('/admin/export-users', 'exportUsers')->name('admin.exportUsers');
    });
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'index')->name('categories');
    Route::post('/category/new', 'create')->name('category.create');
});



require __DIR__.'/auth.php';
