<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Pemesanan;
use App\Stok;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jual= DetailPemesanan::sum('jumlah');
        $masuk= Stok::sum('jumlah_stok');
        $transaksi= Pemesanan::count();
        $penghasilan = DetailPemesanan::sum('harga');
        return view('index', compact('jual', 'masuk', 'transaksi', 'penghasilan'));
    }
}
