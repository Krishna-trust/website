<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


// Website Routes
Route::get('/', [webController::class, 'index'])->name('index');
Route::get('/about', [webController::class, 'about'])->name('about');
Route::get('/contact', [webController::class, 'contact'])->name('contact');
Route::get('/services', [webController::class, 'services'])->name('services');

Route::delete('labharthi', [App\Http\Controllers\Admin\LabharthiController::class, 'destroy'])->name('admin.labharthi.destroy');
Route::delete('contents', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('admin.contents.destroy');
Route::delete('donation', [App\Http\Controllers\Admin\DonationController::class, 'destroy'])->name('admin.donation.destroy');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Content Routes
    Route::resource('contents', App\Http\Controllers\Admin\ContentController::class)->except('destroy');

    // Labharthi Routes
    Route::resource('labharthi', App\Http\Controllers\Admin\LabharthiController::class)->except('destroy');

    // Donation Routes
    Route::resource('donation', App\Http\Controllers\Admin\DonationController::class)->except('destroy');
});
