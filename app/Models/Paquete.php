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
        return $this->belongsToMany(Evento::class);
    }

}
