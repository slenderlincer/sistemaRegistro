<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableRol extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        // Agrega aquí otros campos según sea necesario
    ];

    // Puedes agregar relaciones con otros modelos si es necesario
    // Por ejemplo, si tienes una relación con usuarios, podrías tener algo como:
    // public function usuarios()
    // {
    //     return $this->hasMany(User::class);
    // }
}
