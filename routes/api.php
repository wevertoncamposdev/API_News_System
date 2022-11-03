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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('reports', \App\Http\Controllers\Api\ReportController::class);
Route::apiResource('comments', \App\Http\Controllers\Api\CommentController::class);
Route::apiResource('images', \App\Http\Controllers\Api\ImageController::class);
Route::apiResource('trash', \App\Http\Controllers\Api\TrashController::class);


