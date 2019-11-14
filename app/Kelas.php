<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_kelas');
    }
}
