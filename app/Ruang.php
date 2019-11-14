<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }
}
