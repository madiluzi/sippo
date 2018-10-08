<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Validator;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->validate($request, [
            'nama-kategori' => 'required|min:3',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->input('nama-kategori');
        $kategori->save();

        return redirect('data-kategori-produk');
    }

    public function update($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori-produk.form-edit-kategori-produk', compact('kategori'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'nama-kategori' => 'required|min:3',
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->input('nama-kategori');
        $kategori->update();
        return redirect('data-kategori-produk');
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('data-kategori-produk');
    }

    public function viewProduk($id)
    {
        $kategori = Kategori::find($id);
        $produk = Produk::where('id_kategori', $id)->paginate(10);
//        $produk = $data::paginate(10);
        return view('produk.produk', compact('produk', 'kategori'));
    }
}
