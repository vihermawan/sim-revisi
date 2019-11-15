<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarRawatJalan extends Model
{
    protected $table = 'daftar_rawat_jalan';

    public function icd()
    {
        return $this->hasMany(Icd::class, 'id', 'id_icd');
    }

    public function diagnosa()
    {
        return $this->hasMany(Diagnosa::class, 'id', 'id_diagnosa');
    }

    public function dokter()
    {
        return $this->hasMany(Diagnosa::class, 'id', 'id_diagnosa');
    }

    public function poli()
    {
        return $this->hasMany(Poli::class, 'id', 'id_poli');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'id_user');
    }
}
