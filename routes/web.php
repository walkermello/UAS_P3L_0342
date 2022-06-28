<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Karyawan\KaryawanController;
use App\Http\Controllers\Pengemudi\PengemudiController;
use App\Http\Controllers\Jadwal\JadwalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Promo\PromoController;
use App\Http\Controllers\Transaksi\TransactionController;
use App\Http\Controllers\PDFController;
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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
        });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        Route::get('/add-new',[UserController::class,'add'])->name('add');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::post('/update',[UserController::class,'update'])->name('update');
        Route::get('del/{id}',[UserController::class,'delete'])->name('delete');
   });

});

Route::prefix('karyawan')->name('karyawan.')->group(function(){
       
    Route::middleware(['guest:karyawan','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.karyawan.login')->name('login');
        Route::view('/register','dashboard.karyawan.register')->name('register');
        Route::post('/create',[KaryawanController::class,'create'])->name('create');
        Route::post('/check',[KaryawanController::class,'check'])->name('check');
    });

    Route::middleware(['auth:karyawan','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.karyawan.home')->name('home');
        Route::post('/logout',[KaryawanController::class,'logout'])->name('logout');
        Route::get('/add-new',[KaryawanController::class,'add'])->name('add');
        Route::get('edit/{id}',[KaryawanController::class,'edit'])->name('edit');
        Route::post('/update',[KaryawanController::class,'update'])->name('update');
        Route::get('delKaryawan/{id}',[KaryawanController::class,'delete'])->name('delete');
    });

});

Route::prefix('pengemudi')->name('pengemudi.')->group(function(){

       Route::middleware(['guest:pengemudi','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.pengemudi.login')->name('login');
            Route::view('/register','dashboard.pengemudi.register')->name('register');
            Route::post('/create',[PengemudiController::class,'create'])->name('create');
            Route::post('/check',[PengemudiController::class,'check'])->name('check');
       });

       Route::middleware(['auth:pengemudi','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.pengemudi.home')->name('home');
            Route::post('logout',[PengemudiController::class,'logout'])->name('logout');
            Route::get('/add-new',[PengemudiController::class,'add'])->name('add');
            Route::get('edit/{id}',[PengemudiController::class,'edit'])->name('edit');
            Route::post('/update',[PengemudiController::class,'update'])->name('update');
            Route::get('delDriver/{id}',[PengemudiController::class,'delete'])->name('delete');
       });

});

Route::get('jadwal',[JadwalController::class,'index'])->name('jadwal');
Route::post('add',[JadwalController::class,'add']);
Route::get('ganti/{id}',[JadwalController::class,'ganti']);
Route::post('/gantiJadwal',[JadwalController::class,'gantiJadwal'])->name('ganti');

Route::get('aset',[CarController::class,'index'])->name('aset');
Route::post('adding',[CarController::class,'add']);
Route::get('ubah/{id}',[CarController::class,'edit']);
Route::post('/update_car', [CarController::class,'update'])->name('update.car');
Route::get('hapus/{id}', [CarController::class,'delete']);
Route::get('/car',[CarController::class,'show'])->name('car');

Route::get('/search',[SearchController::class,'search'])->name('web.search');
Route::get('/find',[SearchController::class,'find'])->name('web.find');
Route::get('/cari',[SearchController::class,'cari'])->name('web.cari');
Route::get('/temukan',[SearchController::class,'temukan'])->name('web.temukan');
Route::get('/dapatkan',[SearchController::class,'dapatkan'])->name('web.dapatkan');

Route::get('diskon',[PromoController::class,'index'])->name('diskon');
Route::post('add',[PromoController::class,'add']);
Route::get('update/{id}',[PromoController::class,'edit']);
Route::post('/update', [PromoController::class,'update'])->name('update');
Route::get('delete/{id}', [PromoController::class,'delete']);
Route::get('/promo',[PromoController::class,'show'])->name('promo');

Route::get('booking',[TransactionController::class,'index'])->name('booking');
Route::post('/tambah',[TransactionController::class,'add']);
Route::get('book/{id}', [TransactionController::class,'book']);
Route::get('edit/{id}',[TransactionController::class,'edit']);
Route::post('/ubahTransaksi', [TransactionController::class,'update'])->name('update.transaksi');

Route::get('tambahRating/{id}',[TransactionController::class,'tambahRating']);
Route::post('/ubahRating', [TransactionController::class,'rate'])->name('update.rating');
Route::get('tambahBukti/{id}', [TransactionController::class,'tambahBukti']);
Route::post('/ubahBukti', [TransactionController::class,'bayar'])->name('update.bayar');

Route::get('allTransaksi',[TransactionController::class,'getAll'])->name('allTransaksi');
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);

//Route::get('kontrak',[CarController::class,'showByDate'])->name('kontrak');//

//Auth::routes();//

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//
//

//Auth::routes();//

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
