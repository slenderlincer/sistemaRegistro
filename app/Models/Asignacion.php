<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignaciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_departamento',
        'numeroTarjeta',
        'cargo',
        'nombre',
        'correo',
        'extension',
    ];

    // Relación con el modelo Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    //Relacion con el modelo Trabajadores
    public function trabajador()
    {
        return $this->belongsTo(Trabajadores::class, 'numeroTarjeta', 'numeroTarjeta');
    }
}
