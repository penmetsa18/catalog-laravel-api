<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('api')->get('categories', [\App\Http\Controllers\CategoryController::class, 'index']);

Route::middleware('api')->resource('products', \App\Http\Controllers\ProductController::class)->except(['edit', 'create']);

