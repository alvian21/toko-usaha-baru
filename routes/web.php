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


Route::group(['prefix'=>'admin', 'namespace'=>'Backend'],function () {
    Route::resource('barang','BarangController');
    Route::resource('supplier','SupplierController');
    Route::resource('customer','CustomerController');
    Route::get('/struk','OutputController@struk');
    Route::get('/pembelianbarang','OutputController@pembelian_barang');
    Route::get('/laporangaji','OutputController@laporan_gaji');
    Route::get('/laporanlabarugi','OutputController@laporan_labarugi');
    Route::get('/laporanpembeliancutomer','OutputController@laporan_pembeliancutomer');
});
