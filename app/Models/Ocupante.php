<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocupante extends Model
{
    protected $table = 'ocupante';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'dpi',
        'id_municipio',
        'fecha_fallecimiento',
        'causa_muerte',
        'id_genero',
        'id_nicho',
        'personaje_historico',
    ];


}
