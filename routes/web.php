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

// routes/web.php

// Authentication Routes
// Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.post');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


// Website Routes
Route::get('/', [webController::class, 'index'])->name('index');
Route::get('/about', [webController::class, 'about'])->name('about');
Route::get('/contact', [webController::class, 'contact'])->name('contact');
Route::post('/contact', [webController::class, 'contactPost'])->name('contact.store');
// Route::get('/services', [webController::class, 'services'])->name('services');
Route::get('/impact', [webController::class, 'impacts'])->name('impact');


Route::delete('labharthi', [App\Http\Controllers\Admin\LabharthiController::class, 'destroy'])->name('admin.labharthi.destroy');
Route::delete('contents', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('admin.contents.destroy');
Route::delete('donation', [App\Http\Controllers\Admin\DonationController::class, 'destroy'])->name('admin.donation.destroy');

Route::get('donation/export', [App\Http\Controllers\Admin\DonationController::class, 'export'])->name('admin.donation.export');
Route::get('labharthi/export', [App\Http\Controllers\Admin\LabharthiController::class, 'export'])->name('admin.labharthi.export');


// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    // change language
    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'gu'])) {
            // Store the selected locale in the session
            session()->put('locale', $locale);
        }
        return redirect()->back();
    });

    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Content Routes
    Route::resource('contents', App\Http\Controllers\Admin\ContentController::class)->except('destroy');

    // Labharthi Routes
    Route::resource('labharthi', App\Http\Controllers\Admin\LabharthiController::class)->except('destroy');

    // Donation Routes
    Route::resource('donation', App\Http\Controllers\Admin\DonationController::class)->except('destroy');

    // change password
    Route::get('changePassword', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('changePassword');
    Route::post('changePassword', [App\Http\Controllers\Admin\AdminController::class, 'changePasswordPost'])->name('changePassword.save');
});
