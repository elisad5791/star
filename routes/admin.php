<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', IsAdminMiddleware::class])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::resource('pictures', PictureController::class)->names('admin.pictures');
    Route::resource('videos', VideoController::class)->names('admin.videos');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('comments', CommentController::class)->except(['create', 'store'])->names('admin.comments');
    Route::resource('roles', RoleController::class)->names('admin.roles');
    Route::resource('permissions', PermissionController::class)->names('admin.permissions');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('authors', AuthorController::class)->names('admin.authors');
    Route::resource('profiles', ProfileController::class)->names('admin.profiles');
});
