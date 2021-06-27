<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[\App\Http\Controllers\AccountController::class,'showLogin']);
Route::get('/showLogin',[\App\Http\Controllers\AccountController::class,'showLogin']) -> name("showLogin");
Route::post('login',[\App\Http\Controllers\AccountController::class,'login']) -> name("login");


Route::group(["middleware => cekLoginUser"],function(){
    Route::get('/logout',[\App\Http\Controllers\AccountController::class,'logout']) -> name("logout");
    Route::get('/showSignup',[\App\Http\Controllers\AccountController::class,'showSignup']) -> name("showSignup");
    Route::post('signup',[\App\Http\Controllers\AccountController::class,'signup']) -> name("signup");
    Route::get("user/{id}/dashboard/",[\App\Http\Controllers\AccountController::class,'dashboard']);
    //Add To Cart
    Route::get("/addToCart/{idUser}/{idBarang}",[\App\Http\Controllers\UploadController::class,'addToCart']);
    //view Cart
    Route::get('/user/viewcart/{id}',[\App\Http\Controllers\AccountController::class,'viewCart']);
    //Delete Cart
    Route::get('/user/viewcart/delete/{id_user}/{id}',[\App\Http\Controllers\UploadController::class,'deleteCart']);
    //view Chekout
    Route::get('/user/viewcart/checkout/{id}',[\App\Http\Controllers\AccountController::class,'viewCheckout']);
    //Process Checkout
    Route::post("buktiPembayaran",[\App\Http\Controllers\UploadController::class,'ProccessCheckout']) -> name("process_checkout");
    //View Pesanan
    Route::get('/user/pesanan/{id}',[\App\Http\Controllers\AccountController::class,'viewPesanan']);
    
});




Route::get("/admin",[\App\Http\Controllers\AccountController::class,'admin']);
Route::get("/admin/tambah",[\App\Http\Controllers\AccountController::class,'showTambah']);
Route::get("/admin/tambah_kategori",[\App\Http\Controllers\AccountController::class,'showTambahKategori']);
//Delete kategori
Route::get("/admin/hapus_kategori/{id}",[\App\Http\Controllers\UploadController::class,'deleteKategori']) -> name("hapusKategori");
//Insert Kategori
Route::post("tambahKategori",[\App\Http\Controllers\UploadController::class,'insertKategori']) -> name("tambah_kategori");
Route::post("uploadBarang",[\App\Http\Controllers\UploadController::class,'process']) -> name("process_upload");
//Send
Route::get('/admin/send/{id}',[\App\Http\Controllers\UploadController::class,'send']);
//Edit Barang
Route::get('/admin/edit/',[\App\Http\Controllers\UploadController::class,'edit']) -> name("edit");
//Get Data
Route::post("GetData",[\App\Http\Controllers\UploadController::class,'getData']) -> name("getData");
//Process Edit
Route::post("process_edit",[\App\Http\Controllers\UploadController::class,'ProccessEdit']) -> name("process_edit");
//Laporan
Route::get('/admin/laporan',[\App\Http\Controllers\AccountController::class,'laporan']);



