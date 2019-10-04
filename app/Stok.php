<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id_stok';

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
