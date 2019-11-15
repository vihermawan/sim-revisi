<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParamedisRawatInap extends Model
{
    protected $table = 'paramedis_rawat_inap';

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id', 'id_dokter');
    }

    public function transaksi()
    {
        return $this->hasOne(TransaksiTindakanRawatInap::class, 'id', 'id_transaksi_tindakan_medis_inap');
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
}
