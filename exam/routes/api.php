<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']); // مكن عمل بوست دون auth

Route::middleware('auth:sanctum')->group(function () { // لا يستطيع المستخدم تنفيذ أي عملية دون توكن صحيح.
    Route::apiResource('books', BookController::class);
});
