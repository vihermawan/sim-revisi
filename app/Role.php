<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_role');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_role');
    }
}
