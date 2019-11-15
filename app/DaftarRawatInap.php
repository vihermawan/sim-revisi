<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarRawatInap extends Model
{
    protected $table = 'daftar_rawat_inap';

    public function transaksi_rawat_jalan()
    {
        return $this->hasOne(TransaksiRawatJalan::class, 'id', 'id_pasien');
    }

    public function ruang()
    {
        return $this->hasOne(Ruang::class, 'id', 'id_ruang');
    }
}
