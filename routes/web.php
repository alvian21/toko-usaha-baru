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

Route::get('dashboard', function(){
    return view('dashboard.index');
});

Route::get('pegawai/input', 'Backend\PegawaiController@create');
Route::get('pegawai', 'Backend\PegawaiController@index');

Route::get('kehadiran-pegawai/input', 'Backend\KehadiranPegawaiController@create');
Route::get('kehadiran-pegawai', 'Backend\KehadiranPegawaiController@index');

Route::get('penjualan/input', 'Backend\PenjualanController@create');
Route::get('penjualan', 'Backend\PenjualanController@index');

Route::get('penerimaan-barang/input', 'Backend\PenerimaanBarangController@create');
Route::get('penerimaan-barang', 'Backend\PenerimaanBarangController@index');
