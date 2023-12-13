<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_departamentos'; // Nombre de la clave primaria

    protected $fillable = [
        'tipoDepartamento',
        // Agrega aquí otros campos según sea necesario
    ];

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'id_departamento');
    }

}
