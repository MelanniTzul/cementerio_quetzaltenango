<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'dpi',
        'id_rol',
        'contrasena',
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}

