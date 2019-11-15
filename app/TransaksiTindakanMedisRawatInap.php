<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiTindakanMedisRawatInap extends Model
{
    protected $table = 'transaksi_tindakan_medis_inap';

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class, 'id', 'id_tindakan');
    }
    public function ruang()
    {
        return $this->hasOne(Ruang::class, 'id', 'id_ruang');
    }
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }
    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'id', 'id_dokter');
    }
}
