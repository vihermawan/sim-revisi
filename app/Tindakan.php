<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tindakan';

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'id_tindakan');
    }
}
