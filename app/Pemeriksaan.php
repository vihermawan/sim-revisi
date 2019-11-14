<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function poli()
    {
        return $this->hasOne(Poli::class, 'id', 'id_poli');
    }

    public function resep()
    {
        return $this->hasOne(Resep::class, 'id', 'id_resep');
    }

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class, 'id', 'id_tindakan');
    }

    public function transaksiPoli()
    {
        return $this->belongsTo(TransaksiPoli::class, 'id_pemeriksaan');
    }
}
