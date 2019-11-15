<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    public function icd()
    {
        return $this->hasOne(Tindakan::class, 'id', 'id_icd');
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
