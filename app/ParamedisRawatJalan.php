<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParamedisRawatJalan extends Model
{
    protected $table = 'paramedis_rawat_jalan';

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id', 'id_dokter');
    }

    public function transaksi()
    {
        return $this->hasOne(TransaksiTindakanRawatInap::class, 'id', 'id_transaksi_tindakan_medis_jalan');
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}
