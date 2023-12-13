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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id('numeroTarjeta');
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('NombreCompleto');
            $table->string('RFC');
            $table->string('CURP');
            $table->string('Correo');
            $table->bigInteger('telefono');
            $table->string('Sexo');
            $table->date('fecha_nacimiento');
            $table->integer('Antiguedad');
            $table->string('Grado');
            $table->unsignedBigInteger('id_plaza')->nullable();
            $table->foreign('id_plaza')->references('id_plaza')->on('plazas');
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->foreign('id_rol')->references('id')->on('table_rols');
            $table->string('Discapacidad')->nullable();
            $table->string('Sistema')->nullable();
            $table->string('Posgrado')->nullable();
            $table->string('Dedicacion')->nullable();
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
