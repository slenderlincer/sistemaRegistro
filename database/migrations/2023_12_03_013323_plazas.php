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
        Schema::create('plazas', function (Blueprint $table) {
            $table->id('id_plaza');
            $table->integer('indice');
            $table->integer('subindice');
            $table->string('categoria');
            $table->integer('horas');
            $table->integer('plaza');
            $table->string('tipoCategoria');
            $table->string('plazaCompleta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plazas');
    }
};
