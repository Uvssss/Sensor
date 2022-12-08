<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
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

Route::get('/exists/username/{username}', [UserController::class, 'existsUsername']);
Route::get('/exists/email/{email}', [UserController::class, 'existsEmail']);
Route::get('/exists/sensor/{sensor}', [DataController::class, 'existsSensorname']);


Route::delete("/deleteuser/{id}",[UserController::class,'destroy']);
Route::delete("/deletesensor/{id}",[SensorsControllers::class,'destroy']);
