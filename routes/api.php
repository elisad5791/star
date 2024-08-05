<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PictureController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TagController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsModeratorMiddleware;
use App\Http\Middleware\IsPictureModeratorMiddleware;
use App\Http\Middleware\IsPostModeratorMiddleware;
use App\Http\Middleware\IsPostModeratorMiddlware;
use App\Http\Middleware\IsVideoModeratorMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('pictures', [PictureController::class, 'index'])->name('pictures.index');
    Route::get('pictures/{picture}', [PictureController::class, 'show'])->name('pictures.show');
    Route::get('videos', [VideoController::class, 'index'])->name('video.index');
    Route::get('videos/{video}', [VideoController::class, 'show'])->name('video.show');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);

        Route::apiResource('comments', CommentController::class);
        Route::apiResource('profiles', ProfileController::class);

        Route::post('posts', [PostController::class, 'store'])->name('posts.store');
        Route::post('pictures', [PictureController::class, 'store'])->name('pictures.store');
        Route::post('videos', [VideoController::class, 'store'])->name('video.store');

//        Route::group(['middleware' => IsModeratorMiddleware::class], function () {
//            Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
//            Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//
//            Route::patch('pictures/{picture}', [PictureController::class, 'update'])->name('pictures.update');
//            Route::delete('pictures/{picture}', [PictureController::class, 'destroy'])->name('pictures.destroy');
//
//            Route::patch('videos/{video}', [VideoController::class, 'update'])->name('video.update');
//            Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
//        });

        Route::patch('posts', [PostController::class, 'update'])
            ->name('posts.update')
            ->can('post-update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])
            ->name('posts.destroy')
            ->can('post-delete');

        Route::patch('pictures/{picture}', [PictureController::class, 'update'])
            ->name('pictures.update')
            ->can('picture-update');
        Route::delete('pictures/{picture}', [PictureController::class, 'destroy'])
            ->name('pictures.destroy')
            ->can('picture-delete');

        Route::patch('videos/{video}', [VideoController::class, 'update'])
            ->name('video.update')
            ->can('video-update');
        Route::delete('videos/{video}', [VideoController::class, 'destroy'])
            ->name('video.destroy')
            ->can('video-delete');

        Route::group(['middleware' => IsAdminMiddleware::class], function () {
            Route::apiResource('categories', CategoryController::class);
            Route::apiResource('tags', TagController::class);
            Route::get('authors', [AuthorController::class, 'index']);
            Route::get('users', [UserController::class, 'index']);
        });
    });
});


