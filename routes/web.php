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
//home,index
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/index', 'PelangganController@create')->name('home');
Route::get('/','ReservasiControl@index2');
Route::get('/admin','LoginController@adm');
Route::get('/promo','LoginController@promo');


//akun
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::post('/send', 'EmailController@send');
Route::group(['middleware' => 'auth'], function() {
  Route::get('/profile','PelangganController@index')->name('profile');
  Route::get('/profile/edit', 'PelangganController@edit');
  Route::patch('/profile/edit', 'PelangganController@update');
});
//Auth-login Register
Route::get('login', 'LoginController@loginPage')->name('login.user');
Route::post('auth/logout', 'LoginController@logout')->name('logout');
Route::post('/logout', 'LoginController@logout')->name('logout');
Auth::routes();
Route::post('auth', 'LoginController@login')->name('login');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

//HISTORY Kevin
// Route::get('/history','ReservasiControl@history');
// Route::post('/cancel','ReservasiControl@cancel');
// Route::get('/formrsv/{id}','ReservasiControl@form');
// Route::post('/repeat/{id}','ReservasiContro@repeatrsv');
// Route::get('/hapusrsv/{id}','ReservasiControl@destroy');

//login -register, login-reservasi individu
////install deploy
//////responsi masuk 7.30 -> ujian jam 8
//////datebefore exception di season
//////benerin reservasi


//reservasi
Route::post('/reservasi','ReservasiControl@index')->name('reservasi');
Route::get('/konfirmasiReservasi','ReservasiControl@tampil')->name('konfirmasiReservasi');
Route::post('/konfirmasiReservasi','ReservasiControl@store')->name('konfirmasiReservasi');
//Route::get('/fasilitas',)->name('fasilitas');
Route::get('/editreservasi','ReservasiControl@ed');
Route::post('editrsv','ReservasiControl@edit');
Route::get('/permintaanSpesial','FasilitasController@index')->name('permintaanSpesial');
Route::get('/fasilitas','FasilitasController@edit')->name('fasilitas');
Route::patch('/fasilitas','FasilitasController@update')->name('fasilitas');
//Route::post('/reservasi','ReservasiControl@Check')->name('reservasi');
//Route::get('/reservasi','KamarController@index')->name('reservasi');
Route::get('/search','ReservasiControl@cari');
Route::post('/tampilcari','ReservasiControl@search')->name('search');
Route::get('/showstatus','TransaksiController@index')->name('showstatus');
Route::get('/hapus','ReservasiControl@destroy');

//transaksi
Route::get('/datakartu','PelangganController@index2')->name('datakartu');
Route::post('/createdatakartu','PelangganController@store');
//Route::post('/isiDataTransfer','PelangganController@store')->name('isiDataTransfer');

//Kamar
Route::get('/tampil','KamarController@index')->name('tampil');
Route::get('/buat','KamarController@create')->name('buat');
Route::post('/insertKamar','KamarController@add');
Route::get('/update/{id}','KamarController@update');
Route::get('/edit/{id}','KamarController@edit');
Route::get('/delete/{id}','KamarController@delete');
Route::get('/kamarSearch','KamarController@search');

//Season
Route::get('/tampils','SeasonController@index')->name('tampil');
Route::post('/insertseason','SeasonController@add');
Route::get('/buatSeason','SeasonController@create')->name('buat');
Route::get('/updates/{id}','SeasonController@update');
Route::get('/edits/{id}','SeasonController@edit');
Route::get('/deletes/{id}','SeasonController@destroy');

//User - Admin
Route::get('/buatAdmin','AdminController@create')->name('buat');
Route::post('/insertadm','AdminController@add');
Route::get('/updateAdmin/{id}','AdminController@update');
Route::get('/editAdmin/{id}','AdminController@edit');
Route::get('/deleteAdmin/{id}','AdminController@destroy');


//Fasilitas KhususRoute::get('/tampil','KamarController@index')->name('tampil');
Route::get('/tampilfsl','FasilitasController@index2')->name('tampil');
Route::get('/buatfsl','FasilitasController@create')->name('buat');
Route::post('/insertFasilitas','FasilitasController@add');
Route::get('/updatefsl/{id}','FasilitasController@update');
Route::get('/editfsl/{id}','FasilitasController@edit');
Route::get('/deletefsl/{id}','FasilitasController@destroy');
Route::get('/fasilitasSearch','FasilitasController@search');

//Tanda terima
Route::get('/printBukti','buktiReservasiCtrl@index')->name('printBukti');
Route::post('/printBukti','EmailController@send')->name('email');


//reporting
Route::get('laporan','LaporanController@index');
Route::get('reportcust','LaporanController@pelanggan');
Route::get('reportincomecst','LaporanController@pendapatan1');
Route::get('reportincomeroom','LaporanController@pendapatan2');
Route::get('reportbranch','LaporanController@branch');
Route::get('reportcusttype','LaporanController@tipe');


Route::get('/history','PelangganController@history');
Route::get('/cancel/{id}','PelangganController@cancel');
Route::get('/editReservasiRuangan/{id}','PelangganController@editReservasiRuangan');
Route::get('/editReservasi/{id}','PelangganController@editReservasi');


Route::get('chart','ChartController@chart');
