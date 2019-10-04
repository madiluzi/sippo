<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemesanan extends Model
{
    // protected $table = 'pemesanan';
    // protected $primaryKey = 'id_pemesanan';
    // public $timestamps = false;

    public function detailPemesanan()
    {
        return $this->hasMany('App\DetailPemesanan', 'id_pemesanan');
    }

    public function scopePeramalan($query)
    {
        return $query->select('pemesanan.tgl_pesan', DB::raw('COALESCE(SUM(dp.jumlah), 0) as jumlah'))
            ->leftJoin('detail_pemesanan as dp', 'pemesanan.id_pemesanan', '=',
                'dp.id_pemesanan')
            ->whereRaw('pemesanan.tgl_pesan  >= DATE_ADD("2017-05-21", INTERVAL -6 DAY)')
//                ->whereRaw('p.tgl_pesan  >= DATE_ADD(NOW(), INTERVAL -6 DAY)')
            ->groupBy('pemesanan.tgl_pesan');
    }

}
