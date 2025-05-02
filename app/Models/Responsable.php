<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsable';
    public $timestamps = false;

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



    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    /**
     * Un responsable puede tener muchos contratos.
     */
    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_responsable');
    }
}
