<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;


// Property Routes
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.booking');

// Booking Routes
Route::get('/properties/book/{id}', [PropertyController::class, 'book'])->name('properties.book');
Route::post('/bookings/store', [PropertyController::class, 'store'])->name('bookings.store');

// Extend Contract
Route::get('/properties/extend/{id}', [PropertyController::class, 'extendContract'])->name('properties.extend');
Route::post('/properties/extend/{id}', [PropertyController::class, 'storeExtension'])->name('properties.storeExtension');

// Change Tenant
Route::get('/properties/change-tenant/{id}', [PropertyController::class, 'changeTenant'])->name('properties.changeTenant');
Route::post('/properties/change-tenant/{id}', [PropertyController::class, 'storeChangeTenant'])->name('properties.storeChangeTenant');
