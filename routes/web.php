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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/peramalan', function () {
    return view('peramalan');
});

Route::get('/safety-stock', function () {
    return view('safety-stock');
});

Route::get('/reorder-point', function () {
    return view('reorder-point');
});

Route::get('/barang-masuk', function () {
    return view('barang-masuk.barang-masuk');
});

Route::get('/barang-keluar', function () {
    return view('barang-keluar.barang-keluar');
});

Route::get('/data-pengguna', function () {
    return view('pengguna');
});

//Jenis Barang
Route::group(['prefix' => 'data-jenis-barang'], function () {
    Route::get('/','JenisBarangController@view');
    Route::get('tambah','JenisBarangController@tambah');
    Route::post('proses-tambah','JenisBarangController@proses_tambah');
    Route::get('edit/{id}','JenisBarangController@edit');
    Route::post('proses-edit/{id}','JenisBarangController@proses_edit');
    Route::get('hapus/{id}','JenisBarangController@hapus');
});

//Barang
Route::group(['prefix' => 'data-barang'], function () {
    Route::get('/','BarangController@view');
    Route::get('tambah','BarangController@tambah');
    Route::post('proses-tambah','BarangController@proses_tambah');
    Route::get('edit/{id}','BarangController@edit');
    Route::post('proses-edit/{id}','BarangController@proses_edit');
    Route::get('hapus/{id}','BarangController@hapus');
});

//Pengguna

