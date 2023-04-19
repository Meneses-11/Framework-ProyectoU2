<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'eventos_servicios', 'id_servicio', 'id_evento');
    }
}
