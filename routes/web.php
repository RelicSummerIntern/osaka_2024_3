<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameTimesController;
use App\Http\Controllers\TicketsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [TicketsController::class, 'index'])->name('home');
Route::get('/home', [TicketsController::class, 'index'])->name('home');

Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function () {
    Route::get('show/{id}', [TicketsController::class, 'show'])->name('show');
  });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('login', [AdminLoginController::class, 'index'])->name('index');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/', [AdminLoginController::class, 'dashboard'])->middleware(['auth:admin'])->name('dashboard');
});

Route::group(['prefix' => 'gameTimes', 'as' => 'gameTimes.'], function () {
    Route::get('update/{id}', [GameTimesController::class, 'update'])->name('update');
  });

require __DIR__.'/auth.php';

