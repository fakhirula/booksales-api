<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api'); //md


Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', fn(Request $request) => $request->user()->id);

    Route::middleware(['role:admin,staff'])->group(function () {
        // Route::apiResource('/books', BookController::class);
        Route::apiResource('/genres', GenreController::class);
        Route::apiResource('/authors', AuthorController::class);

        Route::apiResource('/orders', OrderController::class);
        Route::apiResource('/order_details', OrderDetailController::class);

        Route::apiResource('/payment_methods', PaymentMethodController::class);
        Route::apiResource('/payments', PaymentController::class);
    });

    Route::middleware(['role:admin,customer'])->group(function () {
        Route::apiResource('/orders', OrderController::class)->only(['index', 'store']);
        Route::apiResource('/payment_methods', OrderController::class)->only(['index']);
    });


});

Route::apiResource('/books', BookController::class); // sementaraaaaaaaaaaa

Route::apiResource('/books', BookController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);




