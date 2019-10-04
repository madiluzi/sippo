<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Pemesanan;
use App\Produk;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coklat = Produk::coklat()->first();
        $kopi = Produk::kopi()->first();
        $kopiLuwak = Produk::kopiLuwak()->first();
        $sabun = Produk::sabun()->first();
        $produkHabis = Produk::stokHabis()->count();
        $produkHampirHabis = Produk::stokHampirHabis()->count();
        $totalStok = Produk::totalStok();
        $masukTerbaru = Produk::orderBy('updated_at', 'desc')->take(5)->get();
        $hampirHabis = Produk::stokHampirHabis()->take(5)->get();
        dd($coklat);
        return view('index', compact('coklat', 'kopi', 'kopiLuwak', 'sabun', 'hampirHabis', 'masukTerbaru', 'produkHampirHabis', 'produkHabis', 'totalStok'));
    }
}
