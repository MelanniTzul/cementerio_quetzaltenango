<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'dpi',
        'direccion',
        'telefono',
        'correo',
        'id_municipio',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_responsable');
    }
}
