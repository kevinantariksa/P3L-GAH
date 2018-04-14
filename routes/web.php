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
Route::get('/', function () {
    return view('index');
});

//akun
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

//Auth-login Register
Route::get('login', 'LoginController@loginPage')->name('login.user');
Route::post('auth/logout', 'LoginController@logout')->name('logout');
Auth::routes();
Route::post('auth', 'LoginController@login')->name('login');
Route::get('/profile','PelangganController@index')->name('profile');

//reservasi
Route::get('/reservasi','ReservasiControl@index')->name('reservasi');
//Route::post('/reservasi','ReservasiControl@Check')->name('reservasi');
//Route::get('/reservasi','KamarController@index')->name('reservasi');

//transaksi
//
