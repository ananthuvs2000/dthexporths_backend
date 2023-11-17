<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TextureController;
use App\Http\Controllers\SizeController;
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
Route::get('/admindash',[AdminController::class,'dashboard']);
Route::get('/adminLogin',[AdminController::class,'index']);
Route::get('/color',[ColorController::class,'index']);
Route::post('/color_add',[ColorController::class,'add']);
Route::post('/color_remove',[ColorController::class,'remove']);
Route::post('/color_edit',[ColorController::class,'edit']);
Route::post('/color_update',[ColorController::class,'update']);
Route::get('/texture',[TextureController::class,'index']);
Route::post('/texture_add',[TextureController::class,'add']);
Route::post('/texture_remove',[TextureController::class,'remove']);
Route::post('/texture_edit',[TextureController::class,'edit']);
Route::post('/texture_update',[TextureController::class,'update']);
Route::get('/size',[SizeController::class,'index']);
Route::post('/size_add',[SizeController::class,'addd']);
Route::post('/size_remove',[SizeController::class,'remove']);
Route::post('/size_edit',[SizeController::class,'edit']);
Route::post('/size_update',[SizeController::class,'update']);




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

