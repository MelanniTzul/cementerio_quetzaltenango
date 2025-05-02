<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    protected $table = "rol";
    protected $primaryKey = "id";
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(Usuario::class);
    }
}
