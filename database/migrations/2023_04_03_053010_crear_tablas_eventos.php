<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id_evento');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_paquete');
            $table->string('nombre');
            $table->float('precio');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('descripcion');
            $table->integer('id_gerente')->nullable();
            $table->integer('num_personas');
            $table->enum('confirmacion',['0','1','2'])->default('0'); // SinConfirmar  || espera || Confirmado
            $table->boolean('realizado')->default(false);
            $table->timestamps();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
