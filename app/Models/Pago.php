<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory; 

    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';

    public function eventos(){
        return $this->belongsTo(Evento::class, 'id_evento'); //pertenece a
        //un Pago pertenece a Evento
    }
}
