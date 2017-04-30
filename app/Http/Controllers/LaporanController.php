<?php

namespace App\Http\Controllers;

use App\DetailPemesanan;
use App\Stok;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stok = Stok::sum('jumlah_stok')
            ->paginate(10);
        return view('laporan', compact('stok'));
    }
}
