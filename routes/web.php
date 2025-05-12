<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;


// Public routes - 
Route::redirect('/', '/tickets/form
');

// routes/web.php
Route::get('/ticketing/form', [TicketController::class, 'create'])->name('tickets.form');
Route::post('/ticketing/store', [TicketController::class, 'store'])->name('tickets.store');

//Route::get('/payment/{id}', [PaymentController::class, 'index'])->name('payment.index');
//Route::post('/payment/{id}', [PaymentController::class, 'store'])->name('payment.store');

//API
Route::get('/payment/{id}', [PaymentController::class, 'index'])
    ->name('payment.index');
    //->middleware('auth'); // pastikan hanya user yang login bisa akses

    Route::post('/payment/{id}', [PaymentController::class, 'store'])
    ->name('payment.store');
    //->middleware('auth');
