<?php

use App\Produk;

//Produk===========================================================================

Route::get('/data-produk', 'ProdukController@index');
Route::get('/data-produk/tambah', 'ProdukController@create');
Route::post('/data-produk/tambah', 'ProdukController@store');
Route::get('/data-produk/edit/{id}', 'ProdukController@update');
Route::post('/data-produk/edit/{id}', 'ProdukController@edit');
Route::get('/data-produk/hapus/{id}', 'ProdukController@delete');

//Kategori Produk==================================================================

Route::get('/data-kategori-produk', 'KategoriController@index');
Route::get('/data-kategori-produk/tambah', 'KategoriController@create');
Route::post('/data-kategori-produk/tambah', 'KategoriController@store');
Route::get('/data-kategori-produk/edit/{id}', 'KategoriController@update');
Route::post('/data-kategori-produk/edit/{id}', 'KategoriController@edit');
Route::get('/data-kategori-produk/hapus/{id}', 'KategoriController@delete');
Route::get('/data-produk/{id}', 'KategoriController@viewProduk');

//Peramalan=========================================================================

Route::get('/peramalan', 'PeramalanController@index');
Route::post('/peramalan', 'PeramalanController@show');

//Produk Masuk======================================================================

Route::get('/transaksi-masuk', 'TransaksiMasukController@index');
Route::get('/data-stok', 'TransaksiMasukController@dataStok');
Route::get('/transaksi-masuk/tambah/{id}', 'TransaksiMasukController@create');
Route::get('/information/create/ajax-produk', function() {
    $id_kategori = $_GET['id_kategori'];
    //return $id_kategori;
	$produk = Produk::where('id_kategori','=',$id_kategori)->get();
		return $produk;
});

Route::post('/transaksi-masuk/tambah/{id}', 'TransaksiMasukController@store');
Route::get('/transaksi-masuk/edit/{id}', 'TransaksiMasukController@update');
Route::post('/transaksi-masuk/edit/{id}', 'TransaksiMasukController@edit');


//Produk Keluar======================================================================

Route::get('/transaksi-keluar', 'TransaksiKeluarController@index');
Route::get('/transaksi-keluar/tambah', 'TransaksiKeluarController@create');


//Pengguna==========================================================================

Route::get('/data-pengguna', 'PenggunaController@index');
Route::get('/data-pengguna/tambah', 'PenggunaController@create');
Route::post('/data-pengguna/tambah', 'PenggunaController@store');
Route::get('/data-pengguna/edit/{id}', 'PenggunaController@update');
Route::post('/data-pengguna/edit/{id}', 'PenggunaController@edit');
Route::get('/data-pengguna/hapus/{id}', 'PenggunaController@delete');


//Laporan============================================================================

Route::get('/laporan-penjualan', 'LaporanController@penjualan');
Route::get('/data-laporan-penjualan', 'LaporanController@dataPenjualan');
Route::get('/laporan-stok', 'LaporanController@stok');
Route::get('/data-laporan-stok', 'LaporanController@dataStok');

//Auth===============================================================================
Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

//Home===============================================================================

Route::get('/home', 'HomeController@index');
Route::get('/chart-data', 'HomeController@chartData');

//Route::get('/', function () {
//    return view('index');
//});


