<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, CustomerController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware(['auth:api', 'sql.injection.protection'])->group(function () {
    Route::get('/customers/{dni_or_email}', [CustomerController::class, 'show']);
    Route::post('/customers', [CustomerController::class, 'store'])->middleware('validate.customer.data');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
});