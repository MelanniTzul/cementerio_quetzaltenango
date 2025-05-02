<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoContrato extends Model
{
    protected $table = 'estado_contrato';

    protected $fillable = [
        'id',
        'nombre',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'id_estado');
    }
}
