<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'eventos';//nombre de la tabla
    protected $primaryKey = 'id_evento';//id personalizado o primary_key personalizada
    //los metodos indican relaciones con los otros modelos
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


    public function pagos()
    {
    return $this->hasMany(Pago::class, 'evento_id'); // Asegúrate de que la columna sea 'evento_id'
    }


    public function imagenes()//es una relacion muchos a muchos polimorfica para tener multimpes relaciones con multiples modelos
    {
        return $this->morphMany(Imagen::class, 'imageable');//no se necesita una tabla para cada tipo de modelo.
    }

    public function gastos(){
        return $this->hasMany(Gasto::class, 'id_evento');
    }

}
