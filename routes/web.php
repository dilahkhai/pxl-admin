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
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.store');
Route::get('/bookings/book/{id}', [PropertyController::class, 'book'])->name('properties.book');
Route::post('/bookings/store', [PropertyController::class, 'store'])->name('properties.store');
Route::get('/bookings/extend/{id}', [PropertyController::class, 'extendContract'])->name('properties.extend');
Route::post('/bookings/extend/{id}', [PropertyController::class, 'storeExtension'])->name('properties.storeExtension');
Route::get('/bookings/change-tenant/{id}', [PropertyController::class, 'changeTenant'])->name('properties.changeTenant');
Route::post('/bookings/change-tenant/{id}', [PropertyController::class, 'storeChangeTenant'])->name('properties.storeChangeTenant');