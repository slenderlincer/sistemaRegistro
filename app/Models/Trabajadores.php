<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    protected $primaryKey = 'numeroTarjeta';
    protected $fillable = [
        'numeroTarjeta',
        'Nombre', // Cambiado desde 'nombre'
        'ApellidoPaterno',
        'ApellidoMaterno',
        'NombreCompleto',
        'Sexo', // Cambiado desde 'sexo'
        'Correo', // Cambiado desde 'correo'
        'Telefono',
        'RFC',
        'CURP',
        'fecha_nacimiento', // Cambiado desde 'edad'
        'Antiguedad',
        'Grado',
        'id_plaza',
        'id_rol',
        'Discapacidad', // Cambiado desde 'discapacidad'
        'Sistema',
        'Posgrado',
        'Dedicacion',
    ];

    // Puedes agregar relaciones con otros modelos si es necesario
    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'id_plaza');
    }
    // Relación con el modelo Rol
    public function rol()
    {
        return $this->belongsTo(TableRol::class, 'id_rol');
    }
    public function asignacion()
{
    return $this->hasOne(Asignacion::class, 'numeroTarjeta', 'numeroTarjeta');
}
}

