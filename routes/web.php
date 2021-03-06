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




Route::group(['namespace' => 'Frontend'], function () {
    Route::get("/", "HomeController@index")->name("home");
    Route::get('login', 'AuthController@getLogin')->name("customer.getlogin");
    Route::post('login', 'AuthController@postLogin')->name("customer.login");

    Route::get('register', 'AuthController@getRegister')->name("customer.getregister");
    Route::post('register', 'AuthController@postRegister')->name("customer.register");

    Route::resource('cart', 'CartController',['only' => ['store']]);
    //catalog controller
    Route::resource('catalog', 'CatalogController');

    Route::group(['middleware' => 'auth:frontend'], function () {


        //cartcontroller
        Route::resource('cart', 'CartController',['except' => ['store']]);
        //user controller
        Route::resource('user', 'UserController');

        //checkout controller
        Route::get('/checkout/getharga','CheckoutController@getHarga')->name('checkout.getharga');
        Route::get('/checkout/deletecart','CheckoutController@deleteCart')->name('checkout.delete');
        Route::post('/checkout/changeqty','CheckoutController@changeQty')->name('checkout.qty');
        Route::resource('checkout', 'CheckoutController');
        //address controller
        // Route::get('/address/city','AddressController@getKota')->name('address.city');
        Route::resource('address', 'AddressController');
        Route::resource('order', 'OrderController');
        Route::resource('notifikasi', 'NotifikasiController');

        Route::get('/logout', 'AuthController@logout')->name('frontend.logout');
    });
    //aboutus controller
    Route::resource('aboutus', 'AboutusController');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    Route::get('login', 'AuthController@getLogin')->name("admin.getlogin");
    Route::post('login', 'AuthController@postLogin')->name("admin.login");

    Route::group(['middleware' => 'auth:backend'], function () {
        Route::get('logout', 'AuthController@logout')->name("admin.logout");

        //chart
        Route::get('/chart/penjualan','DashboardController@chartPenjualan')->name('chart.penjualan');

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

        Route::get('finance/laporan','FinanceController@periodeLaporan');
        Route::get('finance/indexlap','FinanceController@modalLaporan');
        Route::get('finance','FinanceController@index');
        Route::get('finance/create','FinanceController@create');
        Route::get('finance/{finance}/edit','FinanceController@edit');
        Route::patch('finance/{finance}/update','FinanceController@update');
        Route::post('finance/store','FinanceController@store');
        Route::get('finance/{finance}/delete','FinanceController@destroy');
        Route::get('finance/{file}','FinanceController@showDocument');

        //Route::get('finance/laporan','FinanceController@labaRugi');
        Route::get('sales','SalesController@index');
        Route::get('sales/create','SalesController@create');
        Route::post('sales/store','SalesController@store');
        Route::post('sales/create/add','SalesController@addList');
        Route::get('sales/create/delete/{id}','SalesController@deleteBarang');
        Route::get('sales/getHarga/{id}','SalesController@getHarga');
        Route::get('sales/uptMin/{id}','SalesController@updateMinus');
        Route::get('sales/uptPlus/{id}','SalesController@updatePlus');
        Route::get('sales/getTotal','SalesController@getTotal');
        Route::get('sales/detail/{id}','SalesController@getDetail');
        Route::get('sales/cetak-struk','SalesController@getStruk');


        Route::get('penjadwalan/showNotif','PenjadwalanController@showNotif')->name('showNotif');
        Route::get('safetystok/getSafetyStok','SafetyStokController@getSafetyStok')->name('getSafetyStok');
        Route::delete('safetystok/{id}','SafetyStokController@destroy')->name('destroySS');

        Route::get('categories','CategoriesController@index');
        Route::get('categories/create','CategoriesController@create');
        Route::post('categories/store','CategoriesController@store')->name('categories.store');
        Route::get('categories/{categories}/edit','CategoriesController@edit')->name('categories.edit');
        Route::patch('categories/{categories}/update','CategoriesController@update')->name('categories.update');

        Route::resource('dashboard', 'DashboardController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('barang', 'BarangController');
        Route::resource('supplier', 'SupplierController');
        Route::resource('customer', 'CustomerController');
        Route::resource('safetystok', 'SafetyStokController');
        Route::resource('onlinesales', 'OnlineSalesController');
        Route::resource('reception', 'PenerimaanBarangController');
        Route::resource('finance', 'FinanceController');

        Route::get('purchase','pembelianController@index');
        Route::get('purchase/create/{id}','pembelianController@create');
        Route::post('/purchase/store','pembelianController@store');
        Route::get('purchase/{purchase}/edit','pembelianController@edit');
        Route::patch('purchase/{purchase}/update','pembelianController@update');
        Route::get('purchase/kirim/{id}','pembelianController@kirim')->name('purchase.kirim');
        Route::get('purchase/diterima/{id}','pembelianController@diterima')->name('purchase.diterima');
        Route::get('purchase/filLaporan','pembelianController@formLaporan');
        Route::get('purchase/getLaporan','pembelianController@getLaporan');
        Route::get('purchase/cetak-laporan','pembelianController@cetakLaporan');
        Route::resource('purchase', 'pembelianController');
        //laporan
        Route::group(['namespace' => 'Laporan','as'=>'laporan.'],function () {

            Route::post('penjualanterlaris/cetak','PenjualanTerlarisController@Cetak')->name('cetak.penjualanterlaris');
            Route::post('penjualan/cetak','PenjualanController@Cetak')->name('cetak.penjualan');
            Route::post('penjualan/cetakdetail','PenjualanController@CetakDetail')->name('cetakdetail.penjualan');
            Route::resource('penjualan','PenjualanController');
            Route::resource('penjualanterlaris','PenjualanTerlarisController');
        });

    });


    // Route::get('/struk','OutputController@struk');
    // Route::get('/pembelianbarang','OutputController@pembelian_barang');
    // Route::get('/laporangaji','OutputController@laporan_gaji');
    // Route::get('/laporanlabarugi','OutputController@laporan_labarugi');
    // Route::get('/laporanpembeliancutomer','OutputController@laporan_pembeliancutomer');
});
