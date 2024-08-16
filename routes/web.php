<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('employees', EmployeeController::class);
Route::resource('service_categories', ServiceCategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('bookings', BookingController::class);
Route::resource('mails', MailController::class);
Route::get('mails/send-test-mail', [MailController::class, 'sendTestMail'])->name('mails.sendTestMail');

