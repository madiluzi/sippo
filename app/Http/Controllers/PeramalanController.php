<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Produk;
use Illuminate\Http\Request;


class PeramalanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $produk = Produk::all();
        $alpha = 0.5;
        $st = Array();
        $bt = Array();
        $ftm = Array();
        $pe = Array();
        $yt = Array();
        $ft = Array();
        $f2t = Array();
        $at = Array();
        $bt = Array();
        $ftp = Array();

        if ($request->id) {
            $data = Pemesanan::peramalan()
                ->where('dp.id_produk', '=', $request->id)->get();
        } else {
            $data = Pemesanan::peramalan()->get();
        }
        for ($i = 0; $i < count($data); $i++) {
//            BROWN=============================================================
            if ($i == 0) {
                $yt[$i] = $data[$i]->jumlah;
                $ft[$i] = $data[$i]->jumlah;
                $f2t[$i] = $data[$i]->jumlah;
                $at[$i] = null;
                $bt[$i] = null;
                $ftp[$i] = null;
                $pe[$i] = null;
            } else {
                $yt[$i] = $data[$i]->jumlah;
                $ft[$i] = ($alpha * $yt[$i]) + (1 - $alpha) * $ft[$i - 1];
                $f2t[$i] = ($alpha * $ft[$i]) + (1 - $alpha) * $f2t[$i - 1];
                $at[$i] = (2 * $ft[$i]) - $f2t[$i];
                $bt[$i] = ($alpha / (1 - $alpha)) * ($ft[$i] - $f2t[$i]);
                $ftp[$i] = $at[$i] + $bt[$i];
                $pe[$i] = abs((($yt[$i] - $ftp[$i]) / $yt[$i]) * 100);
            }
        }
        $mape = ($pe[1] + $pe[2] + $pe[3] + $pe[4] + $pe[5] + $pe[6]) / 6;
        return view('peramalan', compact('data', 'yt', 'ft', 'f2t', 'at', 'bt', 'ftp', 'pe', 'produk', 'mape'));
    }
}
