<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/about', [AboutController::class, 'about']);
Route::get('/teams', [TeamController::class, 'team']);
Route::get('/reach-out', [ContactController::class, 'reachOut']);
Route::post('/contact', [ContactController::class, 'store']);
