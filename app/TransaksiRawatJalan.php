<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRawatJalan extends Model
{
    protected $table = 'transaksi_rawat_jalan';

    public function daftar()
    {
        return $this->hasOne(DaftarRawatJalan::class, 'id', 'id_daftar_rawat_jalan');
    }
}
