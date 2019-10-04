<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // protected $table = 'tb_barang';
    // protected $primaryKey = 'id_barang';
    // public $timestamps = false;

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
}
