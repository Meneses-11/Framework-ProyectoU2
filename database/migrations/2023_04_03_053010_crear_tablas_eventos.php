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
            $table->unsignedInteger('id_servicio')->nullable();
            $table->float('precio');
            $table->date('fecha');
            $table->time('hora');
            $table->string('descripcion');
            $table->boolean('confirmacion')->default(false);
            $table->timestamps();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');

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
