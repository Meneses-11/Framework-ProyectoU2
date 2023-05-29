<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';

    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'evento_id'); // Asegúrate de que la columna sea 'evento_id'
    }

}
