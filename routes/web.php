<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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
    return view('test.test');
});
Route::resource('test', TestController::class);
//Route::post('add',[TestController::class,'add']);
Route::get('destroy/{id}',[TestController::class,'destroy']);
Route::get('edit/{id}',[TestController::class,'edit']);
Route::post('update',[TestController::class,'update']);


//Route::post('create','');
