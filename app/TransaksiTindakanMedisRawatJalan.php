<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiTindakanRawatJalan extends Model
{
    protected $table = 'transaksi_tindakan_medis_jalan';

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class, 'id', 'id_tindakan');
    }
    public function poli()
    {
        return $this->hasOne(Poli::class, 'id', 'id_poli');
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
