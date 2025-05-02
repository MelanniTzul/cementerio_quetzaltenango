<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nicho extends Model
{
    protected $table = 'nicho';
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'id_tipo',
        'id_calle',
        'id_avenida',
        'id_estado',

    ];
    protected $attributes = [
        'id_estado' => 16,
    ];

    public function tipo()
{
    return $this->belongsTo(\App\Models\TipoNicho::class, 'id_tipo');
}

public function calle()
{
    return $this->belongsTo(\App\Models\Calle::class, 'id_calle');
}

public function avenida()
{
    return $this->belongsTo(\App\Models\Avenida::class, 'id_avenida');
}

public function estado()
{
    return $this->belongsTo(\App\Models\EstadoNicho::class, 'id_estado');
}


}
