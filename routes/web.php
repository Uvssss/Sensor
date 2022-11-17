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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[DataController::class,"index"])->middleware(['auth', 'verified']);
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/profile',[UserController::class,"index"])->middleware(['auth', 'verified']);
Route::get("/sensors",[SensorsControllers::class,'index'])->middleware(['auth', 'verified']);
Route::get("/sensors/{id}",[SensorsControllers::class,'show'])->middleware(['auth', 'verified']);
// Graph data
Route::get("/showdata/{id}/{table}",[DataController::class,"show"])->middleware(['auth', 'verified']);
Route::get("/showdata",[DataController::class,"getdata"])->middleware(['auth', 'verified']);
Route::get('/insertdata',[DataController::class,"insertdata"])->middleware(['auth', 'verified']);
// add pieprasijuma routes for sensors and get and insert data blades
