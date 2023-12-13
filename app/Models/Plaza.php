<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    use HasFactory;

    protected $table = 'plazas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_plaza';
    protected $fillable = [
        'indice',
        'subindice',
        'categoria',
        'horas',
        'plaza',
        'tipoCategoria',
        'plazaCompleta',
  
    ];
}