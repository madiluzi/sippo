<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use App\Stok;
use Illuminate\Http\Request;
use Validator;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.form-produk', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama-produk' => 'required|min:3',
            'kategori' => 'required',
            'harga-satuan' => 'required',
            'berat' => 'required',
        ]);

        $path = $request->file('gambar')->store('images', 'gambar');

        $produk = new Produk();
        $produk->nama_produk = $request->input('nama-produk');
        $produk->id_kategori = $request->input('kategori');
        $produk->harga_satuan = $request->input('harga-satuan');
        $produk->berat = $request->input('berat');
        $produk->keterangan = $request->input('keterangan');
        $produk->gambar = $path;
        $produk->save();

        return redirect('/data-produk');
    }

    public function update($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.form-edit-produk', compact('produk', 'kategori'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nama-produk' => 'required|min:3',
            'kategori' => 'required',
            'harga-satuan' => 'required',
            'berat' => 'required',
        ]);

        $produk = Produk::find($id);
        $path = $request->file('gambar')->store('images');
        $produk->nama_produk = $request->input('nama-produk');
        $produk->id_kategori = $request->input('kategori');
        $produk->harga_satuan = $request->input('harga-satuan');
        $produk->berat = $request->input('berat');
        $produk->keterangan = $request->input('keterangan');
        $produk->gambar = $path;
        $produk->update();

        return redirect('/data-produk');
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('data-produk');
    }
}
