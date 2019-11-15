<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = 'perawat';

    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'id', 'id_dokter');
    }
}
