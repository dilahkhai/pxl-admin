<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;


// Booking Routes
Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/book/{id}', [BookingController::class, 'book'])->name('books.book');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('books.store');
Route::get('/bookings/extend/{id}', [BookingController::class, 'extendContract'])->name('books.extend');
Route::post('/bookings/extend/{id}', [BookingController::class, 'storeExtension'])->name('books.storeExtension');
Route::get('/bookings/change-tenant/{id}', [BookingController::class, 'changeTenant'])->name('books.changeTenant');
Route::post('/bookings/change-tenant/{id}', [BookingController::class, 'storeChangeTenant'])->name('books.storeChangeTenant');

// Property Routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/new', [PropertyController::class, 'create']);
Route::post('/properties/new', [PropertyController::class, 'store'])->name('properties.store');
