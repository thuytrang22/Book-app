<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/book', [BookController::class,'index']);
Route::post('/create', [BookController::class,'store']);
Route::get('/show/{id}', [BookController::class,'show']);
Route::put('/update/{id}', [BookController::class,'update']);
Route::delete('/destroy/{id}', [BookController::class,'destroy']);
