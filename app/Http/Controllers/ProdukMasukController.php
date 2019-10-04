<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;
use App\Stok;

class ProdukMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stok = Stok::orderBy('created_at', 'desc')->paginate(10);
//        $stok = Stok::raw('id_produk, sum(jumlah_stok) as stok')
//                ->groupBy('id_produk')
//                ->orderBy('created_at')
//                ->get();

//        $stok = DB::table('itemcosts')
//            ->selectRaw('costType, sum(amountCost) as sum')
//            ->groupBy('costType')
//            ->lists('sum', 'costType');

//        $stok = Stok::sum('jumlah_stok')
//            ->groupBy('id_produk')
//            ->get();

//        $stok = Stok::orderBy('id_produk')
//            ->get();
        return view('transaksi-masuk.transaksi-masuk', compact('stok'));
    }

    public function ajax() // Tanpa (Request $request, $id)
    {
        $cat_id = Input::get('cat_id');
        $subcategories = Kategori::where('id_kategori', $cat_id)->get(); // Sesuaikan dg nama Model Subcategory
        return Response::json($subcategories);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();
        return view('transaksi-masuk.form-transaksi-masuk', compact('kategori', 'produk'));
    }

    public function store(Request $request)
    {
        $stok = new Stok();
        $stok->id_produk = $request->input('nama-produk');
        $stok->jumlah_stok = $request->input('jumlah-stok');
        $stok->save();
    }
}
