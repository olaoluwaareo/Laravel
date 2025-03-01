<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;



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

Route::post("/todo/create", [TodoController::class, 'create']);
Route::get("/todo/read", [TodoController::class, 'read']);
Route::delete('/todo/delete/{user_id}', [TodoController::class, 'delete']);
Route::get('/todo/edit/{user_id}', [TodoController::class, 'edit']);
Route::put('/todo/update/{user_id}', [TodoController::class, 'update']);

