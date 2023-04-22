<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';
    protected $primaryKey = 'id_evento';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'evento_servicio', 'id_evento', 'id_servicio');
    }


    public function pago(){
        return $this->hasMany(Pago::class);  //relacion 1 a muchos
    }

}
