<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanHarian extends Model
{
    protected $table = 'pemeriksaan_harian';

    public function rawatInap()
    {
        return $this->belongsTo(RawatInap::class, 'id_pemeriksaanharian');
    }
}
