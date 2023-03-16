<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SensorsControllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Guest view / Landing Page
Route::get('/', [DataController::class, "welcome"]);
Route::get('/schedule', [ScheduleController::class, "create_data"]); // testing purposes delete later
Route::get('/about', [DataController::class, "about"]);
// Logout
Route::get('/logout', [LogoutController::class, 'logout']);
Route::post("/form", [FormController::class, 'form_input']);

Route::get('/exists/username/{username}', [UserController::class, 'existsUsername']);
Route::get('/exists/email/{email}', [UserController::class, 'existsEmail']);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get("/showsensors", [SensorsControllers::class, 'showsensors']);
    Route::get("/showsensor/{searchby}/{value}", [SensorsControllers::class, 'showsensors']);
    Route::get("/showsensor/{searchby}/", [SensorsControllers::class, 'showsensors']);
    Route::group(['middleware' => ['mod']], function () {

        Route::get('/exists/sensor/{sensor}', [ApiDataController::class, 'existsSensorname']);
        Route::get("/sensors", [SensorsControllers::class, 'index']);
        Route::get('/insertdata', [DataController::class, "insertdata"]);
        Route::get('/update-sensors/{id}', [SensorsControllers::class, "updateview"]);
        Route::post("/sensordata", [DataController::class, "sensorstore"]);
        Route::post("/sensors", [SensorsControllers::class, 'store']);
        Route::post("/updatesensors", [SensorsControllers::class, 'update']);
        Route::post('/insertdata', [DataController::class, "store"]);
        Route::get("/deletesensor/{id}", [SensorsControllers::class, 'destroy']);
    });
    Route::group(["middleware" => ['admin']], function () {
        Route::get('/operator', [OperatorController::class, "ShowView"]);
        Route::get('/operator/{column}/{value}', [OperatorController::class, "ShowView"]);
        Route::get('/operator/{column}/', [OperatorController::class, "ShowView"]);
        Route::get("/restore", [OperatorController::class, "restore"]);
        Route::get("/downgradeuser/{id}", [OperatorController::class, "downgrade"]);
        Route::get("/upgradeuser/{id}", [OperatorController::class, "upgrade"]);
        Route::get("/restoreuser/{id}", [UserController::class, 'restore']);
    });

    Route::get('/home', [DataController::class, "index"]);
    Route::get('/home/linecharts', [DataController::class, "line_charts"]);
    Route::get('/home/areacharts', [DataController::class, "area_charts"]);

    Route::get('/profile', [UserController::class, "index"]);
    Route::get("/showdata", [DataController::class, "getdata"]);
    Route::get("/showdatamultiple", [DataController::class, "getmultipledata"]);

    // User restoration and deletion
    Route::get("/deleteuser/{id}", [UserController::class, 'destroy']);

    //  Ajax routes
    Route::get("/home/circle-chart", [ApiDataController::class, "chart"]);
    Route::get("/home/showgraphs", [ApiDataController::class, "GraphPagination"]);
    Route::get("/getdata/{sensor_id}/{table}/{fromTime}/{toTime}", [ApiDataController::class, "data"]);
    Route::get("/multiplegetdata/{from_Sensor}/{to_sensor}/{table}/{fromTime}/{toTime}/{column}", [ApiDataController::class, "GetDataBetween"]);
    Route::get("/getsensors", [ApiDataController::class, 'getsensors']);
    Route::get("/gettime/{table}/{id}", [ApiDataController::class, "gettime"]);
    Route::get("/home/temp-line-chart",[ApiDataController::class,"avg_temp_line_chart"]);
    Route::get("/home/humid-line-chart",[ApiDataController::class,"avg_humid_line_chart"]);
    Route::get("/home/column-chart",[ApiDataController::class,"column_chart"]);
    Route::get("/home/humid-area-chart",[ApiDataController::class,"humid_area_chart"]);
    Route::get("/home/temp-area-chart",[ApiDataController::class,"temp_area_chart"]);
    //  Posts

    Route::post('/profile', [UserController::class, "update"]);

});
