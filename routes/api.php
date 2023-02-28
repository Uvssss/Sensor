<?php

use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SensorsControllers;
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
Route::get('/exists/sensor/{sensor}', [ApiDataController::class, 'existsSensorname']);

// User restoration and deletion
Route::get("/deleteuser/{id}",[UserController::class,'destroy']);
Route::get("/restoreuser/{id}",[UserController::class, 'restore']);


Route::middleware(["auth","admin"])->group(function () {
    Route::get("/downgradeuser/{id}",[OperatorController::class,"downgrade"]);
    Route::get("/upgradeuser/{id}", [OperatorController::class, "upgrade"]);
});

Route::middleware(["auth","mod"])->group(function(){
    Route::post("/sensordata", [DataController::class, "sensorstore"]);

    Route::post("/sensors",[SensorsControllers::class,'store']);
    Route::post("/updatesensors",[SensorsControllers::class,'update']);
    Route::post('/insertdata',[DataController::class,"store"]);

    Route::get("/deletesensor/{id}",[SensorsControllers::class,'destroy']);
});

//  Ajax routes
Route::get("/getdata/{sensor_id}/{table}/{fromTime}/{toTime}", [ApiDataController::class, "data"]);
Route::get("/multiplegetdata/{from_Sensor}/{to_sensor}/{table}/{fromTime}/{toTime}/{column}", [ApiDataController::class, "GetDataBetween"]);
Route::get("/getsensors", [ApiDataController::class, 'getsensors']);
Route::get("/gettime/{table}/{id}", [ApiDataController::class, "gettime"]);
Route::post("/form",[FormController::class,'form_input']);
Route::post('/profile',[UserController::class,"update"]);

