<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'Usuarios';
    protected $primaryKey = 'id_usuario';
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_usuario');
    }

    public function bitacoraImg(){ //varios registros
        return $this->hasMany(BitacoraImg::class, 'id_usuario');
    }


}
