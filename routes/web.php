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
// Logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// add pieprasijuma routes for sensors and get and insert data blades

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home',[DataController::class,"index"]);

    // Dashboard routes
    Route::get('/profile',[UserController::class,"index"]);
    Route::get("/sensors",[SensorsControllers::class,'index']);
    Route::get("/showdata",[DataController::class,"getdata"]);
    Route::get('/insertdata',[DataController::class,"insertdata"]);

    // Storing aka adding data to database
    Route::post("/sensor",[SensorsControllers::class,'store']);
    // Graph data
    Route::get("/showdata/{id}/{table}",[DataController::class,"show"]);
});
