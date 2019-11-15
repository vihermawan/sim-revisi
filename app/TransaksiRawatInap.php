<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRawatInap extends Model
{
    protected $table = 'transaksi_rawat_inap';

    public function daftar()
    {
        return $this->hasOne(DaftarRawatInap::class, 'id', 'id_daftar_rawat_inap');
    }
}
