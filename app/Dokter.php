<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    public function poli()
    {
        return $this->hasOne(Poli::class, 'id', 'id_poli');
    }
}
