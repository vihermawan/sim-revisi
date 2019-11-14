<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table = 'poli';

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }
}
