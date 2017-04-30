<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function stok()
    {
        return $this->hasMany('App\Stok', 'id_produk');
    }

    public function detailPemesanan()
    {
        return $this->hasMany('App\DetailPemesanan', 'id_produk');
    }
}
