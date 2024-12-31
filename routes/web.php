<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;


// Booking Routes
Route::get('/bookings', [BookingController::class, 'index'])->name('books.index');
Route::get('/bookings/book/{id}', [BookingController::class, 'createBooking'])->name('books.book');
Route::post('/bookings/store', [BookingController::class, 'storeBooking'])->name('books.store');
Route::get('/bookings/extend/{id}', [BookingController::class, 'extendContract'])->name('books.extend');
Route::post('/bookings/extend/{id}', [BookingController::class, 'storeExtension'])->name('books.storeExtension');
Route::get('/bookings/change-tenant/{id}', [BookingController::class, 'changeTenant'])->name('books.changeTenant');
Route::post('/bookings/change-tenant/{id}', [BookingController::class, 'storeChangeTenant'])->name('books.storeChangeTenant');

// Property Routes
Route::get('/', [PropertyController::class, 'index']);
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.property');
Route::post('/properties/new', [PropertyController::class, 'store'])->name('properties.store');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.detail');
