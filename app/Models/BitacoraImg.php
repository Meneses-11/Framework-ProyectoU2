<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraImg extends Model
{
    use HasFactory;
    protected $table = 'bitacoraimg';

    public function usuario()//solo uno
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
