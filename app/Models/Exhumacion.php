<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    protected $table = 'exhumacion';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_ocupante',
        'id_nicho',
        'solicitante',
        'motivo',
        'fecha_solicitud',
        'aprobado',
        'aprobado_por',
        'estado'
    ];

    // Relación: una exhumación pertenece a un ocupante
    public function ocupante()
    {
        return $this->belongsTo(Ocupante::class, 'id_ocupante');
    }
}
