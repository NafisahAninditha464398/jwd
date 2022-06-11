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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kelasBus', 'KelasBus@index')->name('KelasBus');
Route::get('/daftarHarga', 'DaftarHarga@index')->name('DaftarHarga');
Route::get('/pesanTiket', 'pesanTiket@index')->name('PesanTiket');
Route::post('/pesanTiket', 'pesanTiket@insert')->name('pesan');
Route::get('/', 'pesanTiket@pesanan')->name('home');