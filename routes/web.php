<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TextureController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\Generalsettings;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AcceptController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DaystartController;

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
Route::get('/getdatetime',[Generalsettings::class,'getdatetime']);
Route::get('/vendor',[VendorController::class,'index']);
Route::post('/vendor_add',[VendorController::class,'add']);
Route::post('/vendor_remove',[VendorController::class,'remove']);
Route::post('/vendor_edit',[VendorController::class,'edit']);
Route::post('/vendor_update',[VendorController::class,'update']);
Route::get('/team',[TeamController::class,'index']);
Route::post('/team_add',[TeamController::class,'add']);
Route::post('/team_remove',[TeamController::class,'remove']);
Route::post('/team_edit',[TeamController::class,'edit']);
Route::post('/team_update',[TeamController::class,'update']);
Route::get('/itemcheck',[CheckController::class,'index']);
Route::post('/itemcheck_add',[CheckController::class,'add']);
Route::post('/itemcheck_remove',[CheckController::class,'remove']);
Route::post('/itemcheck_edit',[CheckController::class,'edit']);
Route::post('/itemcheck_update',[CheckController::class,'update']);
Route::post('/filter_check_status',[CheckController::class,'filter_check_staus']);
Route::get('/worker',[WorkerController::class,'index']);
Route::post('/worker_add',[WorkerController::class,'add']);
Route::post('/worker_remove',[WorkerController::class,'remove']);
Route::post('/worker_edit',[WorkerController::class,'edit']);
Route::post('/worker_update',[WorkerController::class,'update']);
Route::get('/itemaccept',[AcceptController::class,'index']);
Route::post('/item_accept_tmp',[AcceptController::class,'get_accept_tmp']);
Route::post('/item_accept_tmp_add',[AcceptController::class,'accept_tmp_store']);
Route::post('/item_accept_tmp_remove',[AcceptController::class,'accept_tmp_remove']);
Route::post('/accept_tmp_store_confirm',[AcceptController::class,'accept_tmp_store_confirm']);
Route::post('/store_temp_img',[MediaController::class,'store_temp_img']);
Route::post('/get_batchcode_available_boxes',[AcceptController::class,'get_batchcode_available_boxes']);
Route::post('/accepted_batch_details',[AcceptController::class,'accepted_batch_details']);
Route::post('/daystart_entry',[DaystartController::class,'add']);
Route::get('/get_daystart_entry',[DaystartController::class,'index']);
Route::post('/daystart_filter_by_date',[DaystartController::class,'filter_by_date']);








// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

