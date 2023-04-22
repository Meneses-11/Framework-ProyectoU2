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
        Schema::create('evento_servicio', function (Blueprint $table) {
            $table->unsignedInteger('id_evento');
            $table->unsignedInteger('id_servicio');
            $table->timestamps();

            $table->foreign('id_evento')->references('id_evento')->on('eventos');
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
