<?php

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('index');
});

Route::get('/laporan', function () {
    return view('laporan');
});


Route::get('/safety-stock', function () {
    return view('safety-stock');
});

Route::get('/reorder-point', function () {
    return view('reorder-point');
});

Route::get('/produk-masuk', function () {
    return view('produk-masuk.produk-masuk');
});

Route::get('/produk-keluar', function () {
    return view('produk-keluar.produk-keluar');
});

Route::get('/data-pengguna', function () {
    return view('pengguna');
});

//Produk
Route::get('/data-produk','ProdukController@index');
Route::get('/data-produk/tambah','ProdukController@create');
Route::post('/data-produk/proses-tambah','ProdukController@store');
Route::get('/data-produk/edit/{id}','ProdukController@update');
Route::post('/data-produk/proses-edit/{id}','ProdukController@edit');
Route::get('/data-produk/hapus/{id}','ProdukController@delete');

//Kategori Produk
Route::get('/data-kategori-produk','KategoriController@index');
Route::get('/data-kategori-produk/tambah','KategoriController@create');
Route::post('/data-kategori-produk/proses-tambah','KategoriController@store');
Route::get('/data-kategori-produk/edit/{id}','KategoriController@update');
Route::post('/data-kategori-produk/proses-edit/{id}','KategoriController@edit');
Route::get('/data-kategori-produk/hapus/{id}','KategoriController@delete');


//Peramalan
Route::get('/peramalan','PeramalanController@index');
Route::post('/peramalan','PeramalanController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

