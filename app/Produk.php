<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    // protected $table = 'produk';
    // protected $primaryKey = 'id_produk';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailPemesanan()
    {
        return $this->hasMany('App\DetailPemesanan', 'id_produk');
    }

    public function scopeGetTanggal($query)
    {
        return $query->select(DB::raw('day(updated_at) as hari'))
            ->whereRaw('updated_at >= DATE_ADD(2017-05-15, INTERVAL -7 DAY)')
            ->groupBy('hari');
    }

    public function scopeStokHampirHabis($query)
    {
        return $query->where('jumlah_stok', '<', 20)
            ->orderBy('jumlah_stok');
    }

    public function scopeStokHabis($query)
    {
        return $query->where('jumlah_stok', 0);
    }

    public function scopeTotalStok($query)
    {
        return $query->sum('jumlah_stok');
    }

    public function scopeCoklat($query)
    {
        return $query->where('id_produk', 17);
    }

    public function scopeKopi($query)
    {
        return $query->where('id_produk', 104);
    }

    public function scopeSabun($query)
    {
        return $query->where('id_produk', 134);
    }

    public function scopeKopiLuwak($query)
    {
        return $query->where('id_produk', 118);
    }
}
