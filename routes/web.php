<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\GameTimesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\EnterController;
use App\Http\Controllers\PaymentsController;

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

Route::get('/credit-info', function () {
    return view('credit-info');
})->name('credit-info');

Route::group(['middleware' => ['auth'],'prefix' => 'tickets', 'as' => 'tickets.'], function () {
    Route::get('show/{id}', [TicketsController::class, 'show'])->name('show');
    Route::get('create/{game_id}/{seat_number_id}', [TicketsController::class, 'create'])->name('create');
    Route::get('store/{ticket_id}', [TicketsController::class, 'store'])->name('store');
    Route::get('code/{order_number}', [TicketsController::class, 'show_code'])->name('show_code');
    Route::get('counter/{user_id}', [TicketsController::class, 'counter'])->name('counter');
  });

Route::get('/purchased', function () {
    return view('purchased');
})->name('kounyuu');

Route::get('/exit', function () {
    return view('exit');
})->name('exit');


Route::get('/seat-select', function () {
    return view('seat-select');
})->name('seat-select');

Route::get('/ticket', function () {
    return view('ticket');
})->name('ticket');


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

Route::get('/admin/update/{buyer_id}', [EnterController::class, 'update'])->middleware(['auth:admin'])->name('enter.update');

Route::middleware('auth')->group(function () {
    Route::get('/payments/store/{order_number}', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('/payments/show/{buyer_id}', [PaymentsController::class, 'show'])->name('payments.show');
});

Route::group(['prefix' => 'gameTimes', 'as' => 'gameTimes.'], function () {
    Route::get('update/{id}', [GameTimesController::class, 'update'])->name('update');
  });

require __DIR__.'/auth.php';

