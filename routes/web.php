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

// Google OAuth Routes
Route::get('/auth/google', [App\Http\Controllers\AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');


// Language switcher (public)
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'gu'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Website Routes
Route::get('/', [webController::class, 'index'])->name('index');
Route::get('/about', [webController::class, 'about'])->name('about');
Route::get('/contact', [webController::class, 'contact'])->name('contact');
Route::post('/contact', [webController::class, 'contactPost'])->name('contact.store');
// Route::get('/services', [webController::class, 'services'])->name('services');
Route::get('/impact', [webController::class, 'impacts'])->name('impact');
Route::post('/donation', [webController::class, 'donationStore'])->name('donation.store');
Route::get('privacy-policy', [webController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-and-conditions', [webController::class, 'termsAndConditions'])->name('terms-and-conditions');

// Public Donation Receipt
Route::get('/donation/receipt/{id}/image', [App\Http\Controllers\Admin\DonationController::class, 'downloadReceiptImage'])->name('admin.donation.receipt.image');


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

    Route::get('leaflet-map', [App\Http\Controllers\Admin\AdminController::class, 'leafletMap'])->name('leaflet-map');


    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    // Content Routes
    Route::resource('contents', App\Http\Controllers\Admin\ContentController::class)->except('destroy');
    Route::delete('contents', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('contents.destroy');

    // Labharthi Routes
    Route::resource('labharthi', App\Http\Controllers\Admin\LabharthiController::class)->except(['show','destroy']);
    Route::delete('labharthi', [App\Http\Controllers\Admin\LabharthiController::class, 'destroy'])->name('labharthi.destroy');
    Route::get('labharthi/export', [App\Http\Controllers\Admin\LabharthiController::class, 'export'])->name('labharthi.export');

    // Attendance Routes for Labharthi
    Route::resource('attendance', App\Http\Controllers\Admin\AttendanceController::class)->except('destroy');

    // Donation Routes
    Route::resource('donation', App\Http\Controllers\Admin\DonationController::class)->except('destroy');
    Route::delete('donation', [App\Http\Controllers\Admin\DonationController::class, 'destroy'])->name('donation.destroy');
    Route::get('donation/export', [App\Http\Controllers\Admin\DonationController::class, 'export'])->name('donation.export');
    Route::get('donation/whatsapp/{id}', [App\Http\Controllers\Admin\DonationController::class, 'sendWhatsApp'])->name('donation.whatsapp');

    // Expense Routes
    Route::resource('expense', App\Http\Controllers\Admin\ExpenseController::class)->except('destroy');
    Route::delete('expense', [App\Http\Controllers\Admin\ExpenseController::class, 'destroy'])->name('expense.destroy');

    // Employee Routes
    Route::resource('employee', App\Http\Controllers\Admin\EmployeeController::class)->except('destroy');
    Route::delete('employee', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('employee/withdrawal/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'Withdrawal'])->name('employee.withdrawal');
    Route::post('employee/withdrawal', [App\Http\Controllers\Admin\EmployeeController::class, 'WithdrawalStore'])->name('employee.withdrawal.store');

    // Service Routes
    Route::resource('service', App\Http\Controllers\Admin\ServiceController::class)->except('destroy');
    Route::delete('service', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('service.destroy');

    // Testimonial Routes
    Route::resource('testimonial', App\Http\Controllers\Admin\TestimonialController::class)->except('destroy');
    Route::delete('testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    // contact us
    Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact.index');

    // Reports
    Route::get('monthly-report', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('monthly-report.index');
    Route::get('monthly-report/donation', [App\Http\Controllers\Admin\ReportController::class, 'donationReport'])->name('monthly-report.donation');
    Route::get('monthly-report/labharthi', [App\Http\Controllers\Admin\ReportController::class, 'labharthiReport'])->name('monthly-report.labharthi');
    Route::get('monthly-report/attendance', [App\Http\Controllers\Admin\ReportController::class, 'attendanceReport'])->name('monthly-report.attendance');
    Route::get('monthly-report/expense', [App\Http\Controllers\Admin\ReportController::class, 'expenseReport'])->name('monthly-report.expense');
    Route::get('monthly-report/contact', [App\Http\Controllers\Admin\ReportController::class, 'contactReport'])->name('monthly-report.contact');
    Route::get('monthly-report/employee-withdrawal', [App\Http\Controllers\Admin\ReportController::class, 'employeeWithdrawalReport'])->name('monthly-report.employee-withdrawal');

    // change password
    Route::get('changePassword', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('changePassword');
    Route::post('changePassword', [App\Http\Controllers\Admin\AdminController::class, 'changePasswordPost'])->name('changePassword.save');

    // Labharthi Order position
    Route::get('labharthi/position', [App\Http\Controllers\Admin\LabharthiController::class, 'position'])->name('labharthi.position');
    Route::post('labharthi/update-order', [App\Http\Controllers\Admin\LabharthiController::class, 'updateOrder'])->name('labharthi.update-order');

    // Attendance Export (per day)
    // Route::get('attendance/export', [App\Http\Controllers\Admin\AttendanceController::class, 'export'])->name('attendance.export');
    Route::get('get-next-labharthi-number/{areaId}', [App\Http\Controllers\Admin\LabharthiController::class, 'getNextLabharthiNumber'])
        ->name('get-next-labharthi-number');

    // Notify Donor Routes
    Route::get('notify-donor', [App\Http\Controllers\Admin\NotifyDonorController::class, 'index'])->name('notify-donor.index');
    Route::post('notify-donor/mark-as-done', [App\Http\Controllers\Admin\NotifyDonorController::class, 'markAsDone'])->name('notify-donor.markAsDone');
});
