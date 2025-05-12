<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\PaymentController;

// routes/api.php
Route::post('/ticketing/reservations', [Api\TicketingApiController::class, 'store']);
Route::get('customers/{id}', [CustomerController::class, 'show']);


Route::get('/tickets/{id}', [Api\TicketController::class, 'show']);
Route::get('/user/{id}', [PaymentController::class, 'getUserData']);
