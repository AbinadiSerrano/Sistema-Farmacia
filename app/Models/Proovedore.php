<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proovedore extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre','pais','ciudad','direccion','correo','telefono','estado'
    ];
}
