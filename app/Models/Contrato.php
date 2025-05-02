<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_nicho',
        'id_responsable',
        'fecha_inicio',
        'fecha_fin',
        'creado_por',
    ];

    protected $attributes = [
        'id_estado' => 1,
    ];

    // Relación con Nicho
    public function nicho()
    {
        return $this->belongsTo(Nicho::class, 'id_nicho');
    }




    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }


      // Relación con EstadoContrato
      public function estado()
      {
          return $this->belongsTo(EstadoContrato::class, 'id_estado');
      }

      // Relación con Responsable
      public function responsable()
      {
          return $this->belongsTo(Responsable::class, 'id_responsable');
      }


}
