<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = 'false';

    public function detailPemesanan()
    {
        return $this->hasMany('App\DetailPemesanan', 'id_pemesanan');
    }
}
