<?php

use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\OperatorController;
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
// Check if exists
Route::get('/exists/username/{username}', [UserController::class, 'existsUsername']);
Route::get('/exists/email/{email}', [UserController::class, 'existsEmail']);
Route::get('/exists/sensor/{sensor}', [DataController::class, 'existsSensorname']);

// Deletion
Route::get("/deleteuser/{id}",[UserController::class,'destroy']);
Route::get("/deletesensor/{id}",[SensorsControllers::class,'destroy']);
Route::get("/downgradeuser/{id}",[OperatorController::class,"downgrade"]);
Route::get("/upgradeuser/{id}", [OperatorController::class, "upgrade"]);
// Ajax data for later

Route::get("/getdata/{sensor_id}/{table}/{fromTime}/{toTime}", [ApiDataController::class, "data"]);

Route::get("/getsensors", [ApiDataController::class, 'getsensors']);
Route::get("/gettime/{table}/{id}", [ApiDataController::class, "gettime"]);
// User Restoration
Route::get("/restoreuser/{id}",[UserController::class, 'restore']);
