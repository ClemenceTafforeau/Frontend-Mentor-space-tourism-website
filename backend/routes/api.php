<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/destination', [DestinationController::class, 'index']);
Route::get('/destination/{id}', []);

Route::get('/crew', []);
Route::get('/crew/{id}', []);

Route::get('/technology', []);
Route::get('/technology/{id}', []);
