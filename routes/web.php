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
    Route::resource('employee', 'EmployeeController');

    Route::get('item','BarangController@index');
    Route::get('item/create','BarangController@create');
    Route::get('item/{item}/edit','BarangController@edit');
    Route::patch('item/{item}/update','BarangController@update');
    Route::post('item/store','BarangController@store');
    Route::get('item/{item}/delete','BarangController@destroy');

    Route::get('supplier','SupplierController@index');
    Route::get('supplier/create','SupplierController@create');
    Route::get('supplier/{supplier}/edit','SupplierController@edit');
    Route::patch('supplier/{supplier}/update','SupplierController@update');
    Route::post('supplier/store','SupplierController@store');
    Route::get('supplier/{id}/delete','SupplierController@destroy');

    Route::get('finance','FinanceController@index');
    Route::get('finance/create','FinanceController@create');
    Route::get('finance/{finance}/edit','FinanceController@edit');
    Route::patch('finance/{finance}/update','FinanceController@update');
    Route::post('finance/store','FinanceController@store');
    Route::get('finance/{finance}/delete','FinanceController@destroy');
    Route::get('finance/{file}','FinanceController@showDocument');

    Route::resource('customer','CustomerController');

    // Route::get('/struk','OutputController@struk');
    // Route::get('/pembelianbarang','OutputController@pembelian_barang');
    // Route::get('/laporangaji','OutputController@laporan_gaji');
    // Route::get('/laporanlabarugi','OutputController@laporan_labarugi');
    // Route::get('/laporanpembeliancutomer','OutputController@laporan_pembeliancutomer');
});
