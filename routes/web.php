<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'auth'])->name('auth');
Route::get('/register', [AuthController::class, 'create'])->name('create');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile/cover', [UserController::class, 'editCover'])->name('cover.edit');
    Route::put('profile/cover', [UserController::class, 'updateCover'])->name('cover.update');

    Route::get('profile/{user}', [UserController::class, 'profile'])->name('profile');
    Route::post('logout/', [AuthController::class, 'destroy'])->name('logout');

    Route::get('post/', [PostController::class, 'index'])->name('post.index');
    Route::post('post/', [PostController::class, 'store'])->name('post.store');

    Route::post('follow/', [FollowController::class, 'store'])->name('follow.store');

    Route::post('like/', [LikeController::class, 'store'])->name('like.store');
});
