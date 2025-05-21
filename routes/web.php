<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FrameworkController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\StructerController;
use App\Http\Controllers\Backend\TopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Models\Structer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('frameworks', FrameworkController::class);
    Route::resource('structers', StructerController::class);
    Route::resource('posts', PostController::class);

    Route::get('/admin/posts/topic/{topic}', [PostController::class, 'filterByTopicBack'])->name('admin.posts.topic');
    Route::get('/posts/topic/{topic}/{slug}', [PostController::class, 'showFilteredPost'])->name('posts.topic.show');
    Route::get('/posts/topic/{topic}', [PostController::class, 'filterByTopicFront'])->name('posts.topic');

    Route::get('/admin/posts/framework/{framework}', [PostController::class, 'filterByFramework'])->name('admin.posts.framework');
    Route::get('/posts/framework/{framework}/{slug}', [PostController::class, 'showFilteredPostByFramework'])->name('posts.framework.show');
    Route::get('/posts/framework/{framework}', [PostController::class, 'filterByFrameworkFront'])->name('posts.framework');


    Route::get('/admin/posts/category/{category}', [PostController::class, 'filterByCategory'])->name('admin.posts.category');
    Route::get('/admin/posts/structer/{structer}', [PostController::class, 'filterByStructer'])->name('admin.posts.structer');

    // search
    Route::get('/search', [SearchController::class, 'index']);


});





require __DIR__.'/auth.php';
