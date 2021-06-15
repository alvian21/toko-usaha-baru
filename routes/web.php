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




Route::group(['namespace'=>'Frontend'],function () {
    Route::get("/","HomeController@index")->name("home");
    Route::get('login', 'AuthController@getLogin')->name("customer.getlogin");
    Route::post('login', 'AuthController@postLogin')->name("customer.login");

    Route::get('register', 'AuthController@getRegister')->name("customer.getregister");
    Route::post('register', 'AuthController@postRegister')->name("customer.register");

});

Route::group(['prefix'=>'admin', 'namespace'=>'Backend'],function () {

    Route::get('login', 'AuthController@getLogin')->name("admin.getlogin");
    Route::post('login', 'AuthController@postLogin')->name("admin.login");

    Route::group(['middleware'=>'auth:backend'],function () {
        Route::get('logout', 'AuthController@logout')->name("admin.logout");

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

        Route::get('sales','SalesController@index');
        Route::get('sales/create','SalesController@create');
        Route::post('sales/store','SalesController@store');
        Route::post('sales/create/add','SalesController@addList');
        Route::get('sales/create/delete/{namabarang}','SalesController@deleteBarang');
        Route::get('sales/getHarga/{id}','SalesController@getHarga');
        Route::get('sales/uptMin/{id}','SalesController@updateMinus');
        Route::get('sales/uptPlus/{id}','SalesController@updatePlus');
        Route::get('sales/getTotal','SalesController@getTotal');
        Route::get('sales/detail/{id}','SalesController@getDetail');

        Route::resource('dashboard', 'DashboardController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('barang','BarangController');
        Route::resource('supplier','SupplierController');
        Route::resource('customer','CustomerController');
    });





    // Route::get('/struk','OutputController@struk');
    // Route::get('/pembelianbarang','OutputController@pembelian_barang');
    // Route::get('/laporangaji','OutputController@laporan_gaji');
    // Route::get('/laporanlabarugi','OutputController@laporan_labarugi');
    // Route::get('/laporanpembeliancutomer','OutputController@laporan_pembeliancutomer');
});
