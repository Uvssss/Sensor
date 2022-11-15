<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
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
Route::get("/profile",function(){
    return view("profile.settings");
});
