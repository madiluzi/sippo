<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('kategori-produk.kategori-produk', compact('kategori'));
    }

    public function create()
    {
        return view('kategori-produk.form-kategori-produk');
        /*return view('form-produk',[
            'kategori' => $kategori
        ]);*/
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_produk = $request->input('nama-produk');
        $kategori->id_kategori = $request->input('kategori');
        $kategori->harga_satuan = $request->input('harga-satuan');
        $kategori->stok_unit = $request->input('stok-unit');
        $kategori->berat = $request->input('berat');
        $kategori->gambar = $request->input('gambar');
        $kategori->keterangan = $request->input('keterangan');
        $kategori->save();
        return redirect('data-produk');
    }

    public function update($id)
    {
        $kategori = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.form-edit-produk',compact('kategori'), [
            'detail' => $kategori
        ]);
    }

    public function edit(Request $request, $id)
    {
        $kategori = Produk::find($id);
        $kategori->nama_produk = $request->input('nama-produk');
        $kategori->id_kategori = $request->input('kategori');
        $kategori->harga_satuan = $request->input('harga-satuan');
        $kategori->update();
        return redirect('data-produk');
    }

    public function delete($id)
    {
        $kategori = Produk::find($id);
        $kategori->delete();
        return redirect('data-produk');
    }
}
