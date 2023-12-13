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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id('id_asignacion');
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id_departamentos')->on('departamentos');
            $table->unsignedBigInteger('numeroTarjeta');
            $table->foreign('numeroTarjeta')->references('numeroTarjeta')->on('trabajadores');
            $table->string('cargo');
            $table->string('nombre');
            $table->string('correo');
            $table->integer('extension')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};