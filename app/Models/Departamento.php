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
       
    ];

    //Relacion con el modelo Asignacion
    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'id_departamento');
    }

}
