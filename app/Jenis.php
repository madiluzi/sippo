<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    // protected $table = 'tb_jenis_barang';
    // protected $primaryKey = 'id_jenis';
    // public $timestamps = false;

    public function barang()
    {
        return $this->hasMany('App\Barang', 'id_jenis');
    }
}
