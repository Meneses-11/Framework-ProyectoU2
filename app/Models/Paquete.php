<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $table = 'paquetes';
    protected $primaryKey = 'id_paquete';

    public function eventos() {
        return $this->hasMany(Evento::class, 'id_paquete');
    }
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

}
