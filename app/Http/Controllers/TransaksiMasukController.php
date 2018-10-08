<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class TransaksiMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('transaksi-masuk.transaksi-masuk');
    }

    public function dataStok()
    {
        $stoks = Produk::all();
        return Datatables::of($stoks)
            ->addColumn('action', function ($stok) {
                if (Auth::user()->admin == 0) {
                    return '<a href="/transaksi-masuk/tambah/' . $stok->id_produk . '"><span class="label label-primary">TAMBAH</span>
                </a><a href="/transaksi-masuk/edit/' . $stok->id_produk . '"><span class="label label-warning">EDIT</span></a>';
                }
            })
//            ->addColumn('edit', function ($stok) {
//                return '<a href="/transaksi-masuk/edit/' . $stok->id_produk . '"><span class="label label-warning">EDIT</span></a>';
//            })
            ->make(true);
    }

    public function ajax() // Tanpa (Request $request, $id)
    {
        $cat_id = Input::get('cat_id');
        $subcategories = Kategori::where('id_kategori', $cat_id)->get(); // Sesuaikan dg nama Model Subcategory
        return Response::json($subcategories);
    }

    public function create($id)
    {
        $stok = Produk::find($id);
        return view('transaksi-masuk.form-transaksi-masuk', compact('kategori', 'produks', 'stok'));
    }

    public function store(Request $request, $id)
    {
        $stok = Produk::find($id);
//        $stok->id_produk = $request->input('produk');
        $stok->jumlah_stok = ($request->input('jumlah') + $stok->jumlah_stok);
        $stok->update();
        return redirect('/transaksi-masuk');

    }

    public function update($id)
    {
        $stok = Produk::find($id);
        return view('transaksi-masuk.form-edit-transaksi-masuk', compact('stok'));
    }

    public function edit(Request $request, $id)
    {
        $stok = Produk::find($id);
        $stok->id_produk = $request->input('produk');
        $stok->jumlah_stok = $request->input('jumlah');
        $stok->timestamps = false;
        $stok->update();
        return redirect('/transaksi-masuk');
    }
}
