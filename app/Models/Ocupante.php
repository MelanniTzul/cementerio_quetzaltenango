<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocupante extends Model
{
    protected $table = 'ocupante';
    public $timestamps = false;

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

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    public function nicho()
    {
        return $this->belongsTo(Nicho::class, 'id_nicho');
    }

}
