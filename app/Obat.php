<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_obat');
    }
}
