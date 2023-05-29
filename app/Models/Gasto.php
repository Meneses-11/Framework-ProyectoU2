<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table = 'gastos';

    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'id_evento'); // Asegúrate de que la columna sea 'evento_id'
    }
}
