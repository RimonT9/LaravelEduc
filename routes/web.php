<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DestroyController as PostDestroyController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Auth;

Route::group(['namespace' => 'App\Http\Controllers\Post'], function(){
    Route::get('/posts', IndexController::class)->name('post.index');
    Route::get('/posts/create', CreateController::class)->name('post.create');
    Route::post('/posts', StoreController::class)->name('post.store');
    Route::get('/posts/{post}', ShowController::class)->name('post.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('post.update');
    Route::delete('/posts/{post}', DestroyController::class)->name('post.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::group(['namespace' => 'Post'], function(){
        Route::get('/posts', PostIndexController::class)->name('admin.post.index');
        Route::get('/posts/create', PostCreateController::class)->name('admin.post.create');
        Route::post('/posts', PostStoreController::class)->name('admin.post.store');
        Route::get('/posts/{post}', PostShowController::class)->name('admin.post.show');
        Route::get('/posts/{post}/edit', PostEditController::class)->name('admin.post.edit');
        Route::patch('/posts/{post}', PostUpdateController::class)->name('admin.post.update');
        Route::delete('/posts/{post}', PostDestroyController::class)->name('admin.post.destroy');
    });
});       
        
// Route::get('/posts/update', [PostController::class, 'update']);
// Route::get('/posts/delete', [PostController::class, 'delete']);
// Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
// Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

