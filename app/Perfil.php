<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    // relación 1:1 de Perfil con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
