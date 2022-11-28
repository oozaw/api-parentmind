<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiPostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// auth
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiPostController::class, 'register']);

// articles
Route::get('/articles', [ApiPostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/articles/{id}', [ApiPostController::class, 'show'])->middleware('auth:sanctum');