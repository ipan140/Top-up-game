<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TopupTypeController;
use App\Http\Controllers\TopupTransactionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TopupController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
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



Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index'); // resources/views/dashboard/index.blade.php
    })->name('dashboard');
    Route::resource('topup_transactions', TopupTransactionController::class);
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::resource('categories', CategoryController::class);
    Route::resource('games', GameController::class);
    Route::resource('topup-types', TopupTypeController::class)->names('topup_types');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
});

Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
// Route::resource('topups', TopupController::class)->only(['index', 'show']);
Route::resource('topups', TopupController::class)->only(['index']);
Route::get('/topups/{id}', [TopupController::class, 'show'])->name('topups.show');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// Route::middleware(['auth'])->group(function () {
//     Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// });

