<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use Illuminate\Http\Request;

class TransaksiKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $penjualan = DetailPemesanan::paginate(10);
        return view('transaksi-keluar.transaksi-keluar', compact('penjualan'));
    }
}
