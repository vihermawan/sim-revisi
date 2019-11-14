<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';

    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'id_obat');
    }
}
