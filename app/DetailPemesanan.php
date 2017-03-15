<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detailpemesanan';
    public $timestamps = 'false';
}
