<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailPemesanan extends Model
{
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detailpemesanan';
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }

    public function scopeGetKopi($query)
    {
        return $query->join('pemesanan', 'detail_pemesanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->select('pemesanan.tgl_pesan as tgl_pesan', DB::raw('SUM(detail_pemesanan.jumlah) as jumlah'))
            ->where('tgl_pesan', '>=', 'DATE_ADD("2017-05-21", INTERVAL -7 DAY))')
            ->groupBy('pemesanan.tgl_pesan');
    }

    public function scopeGetCoklat($query)
    {
        return $query->join('pemesanan', 'detail_pemesanan.id_pemesanan', '=', 'pemesanan.id_pemesanan')
            ->select('pemesanan.tgl_pesan as tgl_pesan', DB::raw('SUM(detail_pemesanan.jumlah) as jumlah'))
            ->where('tgl_pesan', '>=', 'DATE_ADD(2017-05-21, INTERVAL -7 DAY))')
            ->groupBy('pemesanan.tgl_pesan')
            ->orderBy('jumlah', 'asc');
    }
}
