<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CrewMemberController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', []);
    Route::apiResource('/admin/crew', CrewMemberController::class);
});

Route::get('/destination', [DestinationController::class, 'list']);
Route::get('/crew', [CrewMemberController::class, 'list']);
Route::get('/technology', [TechnologyController::class, 'list']);
