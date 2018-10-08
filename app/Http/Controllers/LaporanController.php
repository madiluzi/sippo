<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Produk;
use App\Stok;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function penjualan()
    {
        return view('laporan-penjualan');
    }

    public function dataPenjualan()
    {
        $penjualan = DetailPemesanan::with('produk', 'pemesanan');
        return Datatables::of($penjualan)->make(true);
    }

    public function stok()
    {
        return view('laporan-stok');
    }

    public function dataStok()
    {
        $stok = Produk::with('kategori');
        return Datatables::of($stok)
            ->addColumn('status', function ($stok) {
                if ($stok->jumlah_stok == 0)
                    return '<span class="label label-danger">HABIS</span>';
                elseif ($stok->jumlah_stok > 0 && $stok->jumlah_stok <= 20)
                    return '<span class="label label-warning">HAMPIR HABIS</span>';
                else
                    return '<span class="label label-success">CUKUP</span>';
            })
            ->make(true);
    }
}
