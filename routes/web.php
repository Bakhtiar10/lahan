<?php

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


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function() {

    Route::get('/beranda', 'Admin\AdminController@index')->name('admin.beranda')->middleware('auth:admin');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\LoginController@Logout')->name('admin.logout');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/datapenjual', 'Admin\DataUserController@penjual')->name('admin.datapenjual');
    Route::get('/datapembeli', 'Admin\DataUserController@pembeli')->name('admin.datapembeli');

    Route::get('/datalahan', 'Admin\DataLahanController@index')->name('admin.datalahan');
    Route::get('/status', 'Admin\DataLahanController@statuslahan');

    Route::get('/chart','Admin\DashboardController@chart');

    Route::get('/penjual', 'Admin\KomentarWebsiteController@penjual')->name('penjual');
    Route::get('/pembeli', 'Admin\KomentarWebsiteController@pembeli')->name('pembeli');

    Route::get('/pembeli_pdf', 'Admin\DataUserController@pembeliPDF')->name('export_pdf.pembeli');
    Route::get('/penjual_pdf', 'Admin\DataUserController@penjualPDF')->name('export_pdf.penjual');

    Route::get('/lahanmasuk_pdf', 'Admin\DataLahanController@lahanmasukPDF')->name('export_pdf.lahanmasuk');
    Route::get('/lahanjual_pdf', 'Admin\DataLahanController@lahanjualPDF')->name('export_pdf.lahanjual');
    Route::get('/soldout_pdf', 'Admin\DataLahanController@soldoutPDF')->name('export_pdf.soldout');

    Route::get('/komenpembeli_pdf', 'Admin\KomentarWebsiteController@pembeliPDF')->name('export_pdf.komentpembeli');
    Route::get('/komenpenjual_pdf', 'Admin\KomentarWebsiteController@penjualPDF')->name('export_pdf.komentpenjual');
});




Route::prefix('penjual')->group(function() {

    Route::get('beranda', 'Penjual\PenjualController@index')->name('penjual.beranda');
    Route::get('/login', 'AuthPenjual\LoginController@showPenjualLoginForm')->name('penjual.login');
    Route::post('/login', 'AuthPenjual\LoginController@penjualLogin')->name('penjual.login.submit');
    Route::post('/logout', 'AuthPenjual\LoginController@penjualLogout')->name('penjual.logout');
    Route::get('/register', 'AuthPenjual\RegisterController@showPenjualRegisterForm')->name('penjual.register');
    Route::post('/register', 'AuthPenjual\RegisterController@createPenjual')->name('penjual.register.submit');
    Route::get('/password/reset', 'AuthPenjual\ForgotPasswordController@showLinkRequestForm')->name('penjual.password.request');
    Route::post('/password/email', 'AuthPenjual\ForgotPasswordController@sendResetLinkEmail')->name('penjual.password.email');
    Route::get('/password/reset/{token}', 'AuthPenjual\ResetPasswordController@showResetForm')->name('penjual.password.reset');
    Route::post('/password/reset', 'AuthPenjual\ResetPasswordController@resetPenjual')->name('penjual.password.update');


    Route::get('/datasaya', 'Penjual\DataSayaController@index')->name('datasaya');
    Route::get('datalahan/create','Penjual\DataSayaController@create')->name('create');
    Route::post('datalahan/simpan','Penjual\DataSayaController@store')->name('simpan');
    Route::post('datalahan/tambah_gambar', 'Penjual\DataSayaController@add_image')->name('add_image');
    Route::get('/detail/{lahan}', 'Penjual\DataSayaController@detail')->name('detail');
    Route::get('datalahan/edit/{id}', 'Penjual\DataSayaController@edit')->name('edit');
    Route::patch('datalahan/update/{id}','Penjual\DataSayaController@update')->name('update');
    Route::delete('datalahan/destroy/{id}','Penjual\DataSayaController@destroy')->name('destroy');

    Route::post('/penjual_koment', 'Penjual\PenjualController@store')->name('penjual_koment');


});



Route::prefix('pembeli')->group(function() {

    Route::get('/login', 'AuthPembeli\LoginController@showPembeliLoginForm')->name('pembeli.login');
    Route::post('/login', 'AuthPembeli\LoginController@pembeliLogin')->name('pembeli.login.submit');
    Route::post('/logout', 'AuthPembeli\LoginController@pembeliLogout')->name('pembeli.logout');
    Route::get('/register', 'AuthPembeli\RegisterController@showPembeliRegisterForm')->name('pembeli.register');
    Route::post('/register', 'AuthPembeli\RegisterController@createPembeli')->name('pembeli.register.submit');
    Route::get('/password/reset', 'AuthPembeli\ForgotPasswordController@showLinkRequestForm')->name('pembeli.password.request');
    Route::post('/password/email', 'AuthPembeli\ForgotPasswordController@sendResetLinkEmail')->name('pembeli.password.email');
    Route::get('/password/reset/{token}', 'AuthPembeli\ResetPasswordController@showResetForm')->name('pembeli.password.reset');
    Route::post('/password/reset', 'AuthPembeli\ResetPasswordController@reset');


    Route::get('beranda', 'Pembeli\PembeliController@index')->name('pembeli.beranda');
    Route::post('/pembeli_koment', 'Pembeli\PembeliController@store')->name('pembeli_koment');

    Route::get('/peta', 'Pembeli\PetaController@index')->name('peta');
    Route::get('/detail_lahan/{lahan}', 'Pembeli\PetaController@detail_lahan')->name('detail_lahan');
    Route::get('/show/peta', 'Pembeli\PetaController@peta');
});


