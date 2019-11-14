<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePembayaran extends Model
{
    protected $table = 'role_pembayaran';

    public function daftar()
    {
        return $this->belongsTo(Daftar::class, 'id_role_pembayaran');
    }
}
