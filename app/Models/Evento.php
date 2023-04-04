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

    public function gerente()
    {
        return $this->belongsTo(Gerente::class, 'id_gerente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'eventos_servicios', 'id_evento', 'id_servicio');
    }

}