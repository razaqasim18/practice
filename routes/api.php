<?php

use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/post/list', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('/loggout', [Auth::class, 'loggout'])->middleware('auth:sanctum');


Route::get('/check', [UserController::class, 'index']);
Route::post('/post', [UserController::class, 'post']);


Route::post('/login', [Auth::class, 'login']);
Route::post('/register', [Auth::class, 'register']);
