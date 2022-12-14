<?php

use App\Http\Controllers\DataController;
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

    Route::get('/home',[DataController::class,"index"]);

    // Dashboard routes

    Route::get('/profile',[UserController::class,"index"]);
    Route::get("/sensors",[SensorsControllers::class,'index']);
    Route::get("/showdata",[DataController::class,"getdata"]);
    Route::get('/insertdata',[DataController::class,"insertdata"]);
    // Update routes

    Route::get('/update-sensors/{id}',[SensorsControllers::class,"updateview"]);

    // Posts

    Route::post("/sensors",[SensorsControllers::class,'store']);
    Route::post("/updatesensors",[SensorsControllers::class,'update']);
    Route::post('/insertdata',[DataController::class,"store"]);
    Route::post('/profile',[UserController::class,"update"]);
    Route::post("/sensordata", [DataController::class, "sensorstore"]);

});
