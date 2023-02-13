<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SensorsControllers;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',[DataController::class,"about"]);
// Logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::group(['middleware' => ['mod']], function() {
        Route::get("/sensors",[SensorsControllers::class,'index']);
        Route::get('/insertdata',[DataController::class,"insertdata"]);
        Route::get('/update-sensors/{id}',[SensorsControllers::class,"updateview"]);
    });
    Route::group(["middleware"=>['admin']],function(){
        Route::get('/operator',[OperatorController::class,"ShowView"]);
    });
    Route::get('/home',[DataController::class,"index"]);
    // Dashboard routes

    Route::get('/profile',[UserController::class,"index"]);
    Route::get("/showdata",[DataController::class,"getdata"]);
    // Update routes

    // Posts

    Route::post("/sensors",[SensorsControllers::class,'store']);
    Route::post("/updatesensors",[SensorsControllers::class,'update']);
    Route::post('/insertdata',[DataController::class,"store"]);
    Route::post('/profile',[UserController::class,"update"]);
    Route::post("/sensordata", [DataController::class, "sensorstore"]);

});

