<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Pemesanan;
use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;
use App\Penjualan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Array_;


class PeramalanController extends Controller
{

    public function index()
    {
        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "November", "Desember");
        $produk = Produk::all();
        $kategori = Kategori::all();

        $alpha = 0.1;
        $gamma = 0.2;
        $st = Array();
        $bt = Array();
        $ftm = Array();
        $pe = Array();
        $data = DetailPemesanan::all();
        $z = 1.64; //service level = 95%
        

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
        }
        $mape = ($pe[1] + $pe[2] + $pe[3] + $pe[4] + $pe[5]) / 5;
        return view('peramalan', compact('produk', 'kategori', 'bulan', 'data', 'st', 'bt', 'ftm', 'pe', 'mape'));
    }
//    public function index()
//    {
////        $thn = date("m", strtotime(Penjualan::where('tgl_jual', 2017)->get()));
////        $ramal = Penjualan::paginate(5); PAGINATION
//        $tahun = 2017;
//        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
//            "September", "Oktober", "November", "Desember");
//        $produk = Produk::all();
//        $kategori = Kategori::all();
//        $tampil = Pemesanan::all();
////        $tampil = Pemesanan::whereYear('tgl_pesan', $tahun)
////            ->orderBy('tgl_pesan', 'desc')
////            ->take($bulan)
////            ->get();
//        $alpha = 0.1;
//        $gamma = 0.7;
//        $st = Array();
//        $bt = Array();
//        $ftm = Array();
//
//        $data = DetailPemesanan::all();
//        $jumlah = $data->count();
////        $x=$data[0]->jumlah+$data[1]->jumlah;
////        echo $x;
////        die;
//
//        $ramal = Array();
//        for ($i = 0; $i < $jumlah; $i++) {
//            if ($i == 0) {
//                $ramal[$i] = $data[$i]->jumlah;
//                $bt[$i] = $data[$i + 1]->jumlah - $data[$i]->jumlah;
//            } else {
//                $ramal[$i] = $data[$i]->jumlah + $data[$i - 1]->jumlah;
//                $bt[$i] = $gamma - ($data[$i + 1]->jumlah - $data[$i]->jumlah) + (1 - $gamma) * $bt[$i - 1];
//            }
//        }
//        return view('peramalan', compact('produk', 'kategori', 'bulan', 'data', 'ramal', 'bt'));
//    }

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
