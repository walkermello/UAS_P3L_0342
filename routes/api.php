<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AndroidController;

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

Route::post('loginUser',[AndroidController::class,'loginUser']);
Route::post('loginKaryawan',[AndroidController::class,'loginKaryawan']);
Route::get('showCustomer/{id}',[AndroidController::class,'showCustomer']);
Route::get('showPromo',[AndroidController::class,'showPromo']);
Route::get('transaksiCustomer',[AndroidController::class,'transaksiCustomer']);
Route::get('showCar',[AndroidController::class,'showCar']);
Route::get('showBrosur',[AndroidController::class,'showBrosur']);
Route::get('showDriver/{id}',[AndroidController::class,'showDriver']);
Route::get('showAllCustomers',[AndroidController::class,'showAllCustomers']);
Route::get('showAllDrivers',[AndroidController::class,'showAllDrivers']);
Route::get('showAllTransaksis',[AndroidController::class,'showAllTransaksis']);
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);