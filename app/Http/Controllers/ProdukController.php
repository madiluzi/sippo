<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('produk.produk', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.form-produk', compact('kategori'));
        /*return view('form-produk',[
            'kategori' => $kategori
        ]);*/
    }

    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama_produk = $request->input('nama-produk');
        $produk->id_kategori = $request->input('kategori');
        $produk->harga_satuan = $request->input('harga-satuan');
        $produk->stok_unit = $request->input('stok-unit');
        $produk->berat = $request->input('berat');
        $produk->gambar = $request->input('gambar');
        $produk->keterangan = $request->input('keterangan');
        $produk->save();
        return redirect('data-produk');
    }

    public function update($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.form-edit-produk',compact('kategori'), [
            'detail' => $produk
        ]);
    }

    public function edit(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request->input('nama-produk');
        $produk->id_kategori = $request->input('kategori');
        $produk->harga_satuan = $request->input('harga-satuan');
        $produk->update();
        return redirect('data-produk');
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('data-produk');
    }
}
