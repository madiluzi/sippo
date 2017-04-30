<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Pemesanan;
use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;
use App\Penjualan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Array_;


class PeramalanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pilihBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember");
        $produk = Produk::all();
        $kategori = Kategori::all();

        $tahun = 2017;
        $bulan = 2;
        $alpha = 0.1;
        $gamma = 0.2;
        $st = Array();
        $bt = Array();
        $ftm = Array();
        $pe = Array();
//        $data = Pemesanan::all();
//        $data = DetailPemesanan::all();

        $data = DB::table('detail_pemesanan')
            ->join('pemesanan', 'detail_pemesanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->select('pemesanan.tgl_pesan as tgl_pesan', DB::raw('SUM(detail_pemesanan.jumlah) as jumlah'))
            ->groupBy('pemesanan.tgl_pesan')
            ->get();

        $week = pemesanan::select('id_pemesanan')
            ->where('tgl_pesan', '>=', 'DATE_ADD(NOW(), INTERVAL -6 DAY))')
            ->get();

//        dd($week);
//        $z = 1.64; //service level = 95%
        for ($i = 0; $i < 6; $i++) {
            if ($i == 0) {
                $st[$i] = $data[$i]->jumlah;
                $bt[$i] = $data[$i + 1]->jumlah - $data[$i]->jumlah;
                $ftm[$i] = null;
                $pe[$i] = null;
//                dd($st[$i],$bt[$i],$ftm[$i],$mape[$i]);
            } else {
                $st[$i] = $alpha * $data[$i]->jumlah + (1 - $alpha) * ($st[$i - 1] + $bt[$i - 1]);
                $bt[$i] = $gamma * ($st[$i] - $st[$i - 1]) + (1 - $gamma) * $bt[$i - 1];
                $ftm[$i] = ($st[$i - 1] + $bt[$i - 1]) * 1;
                $pe[$i] = (($data[$i]->jumlah - $ftm[$i]) / $data[$i]->jumlah) * 100;
            }
            if ($pe[$i] < 0) {
                $pe[$i] = abs($pe[$i]);
            }
        }

        $mape = ($pe[1] + $pe[2] + $pe[3] + $pe[4] + $pe[5]) / 5;
        return view('peramalan', compact('produk', 'kategori', 'pilihBulan', 'data', 'st', 'bt', 'ftm', 'pe', 'mape'));
    }

    public function show(Request $request)
    {
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $barang = $request->input('produk');
        $tampil = Penjualan::whereYear('tgl_jual', $tahun)
            ->whereMonth('tgl_jual', $bulan)
            ->where('id_barang', '=', $barang)
            ->get();
        return redirect('/peramalan/show');
    }
}
