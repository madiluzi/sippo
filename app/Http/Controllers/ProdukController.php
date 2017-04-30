<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use App\Stok;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stok = Stok::raw('id_produk, sum(jumlah_stok) as stok')
            ->groupBy('id_produk')
            ->orderBy('id_produk')
            ->get();

        $produk = Produk::paginate(15);
        return view('produk.produk', compact('produk', 'stok'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.form-produk', compact('kategori'));
    }

    public function store(Request $request)
    {
//        $file = array('gambar' => Input::file('gambar'));
//        // setting up rules
//        if (Input::file('gambar')->isValid()) {
//            $destinationPath = 'images'; // upload path
//            $extension = Input::file('gambar')->getClientOriginalExtension(); // getting image extension
//            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
//            Input::file('gambar')->move($destinationPath, $fileName); // uploading file to given path
        $path = $request->file('foto')->store('konfirmasi','foto');
            $produk = new Produk();
            $produk->nama_produk = $request->input('nama-produk');
            $produk->id_kategori = $request->input('kategori');
            $produk->harga_satuan = $request->input('harga-satuan');
            $produk->berat = $request->input('berat');
            $produk->keterangan = $request->input('keterangan');
            $produk->gambar = $path;
            $produk->save();
            // sending back with message

            return redirect('/data-produk');
//        } else {
//            // sending back with error message.
//            Session::flash('error', 'uploaded file is not valid');
//            return redirect('/data-produk/tambah');
//        }
    }

    public function update($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.form-edit-produk', compact('produk', 'kategori'));
    }

    public function edit(Request $request, $id)
    {
        $produk = Produk::find($id);
        $file = array('gambar' => Input::file('gambar'));
        // setting up rules
        if (Input::file('gambar')->isValid()) {
            $destinationPath = 'images'; // upload path
            $extension = Input::file('gambar')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            Input::file('gambar')->move($destinationPath, $fileName); // uploading file to given path
            $produk->nama_produk = $request->input('nama-produk');
            $produk->id_kategori = $request->input('kategori');
            $produk->harga_satuan = $request->input('harga-satuan');
            $produk->berat = $request->input('berat');
            $produk->keterangan = $request->input('keterangan');
            $produk->gambar = $fileName;
            $produk->update();
            // sending back with message

            return redirect('/data-produk');
        } else {
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
            return redirect('/data-produk/tambah');
        }

    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('data-produk');
    }
}
