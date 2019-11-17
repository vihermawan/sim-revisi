<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    protected $table = 'rawat_inap';

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function ruang()
    {
        return $this->hasOne(Ruang::class, 'id', 'id_ruang');
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'id', 'id_pemeriksaan');
    }

    public function pemeriksaanHarian()
    {
        return $this->hasOne(PemeriksaanHarian::class, 'id', 'id_pemeriksaanharian');
    }
}
