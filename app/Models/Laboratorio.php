<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;

    protected $fillable=['nombre','direccion','correo','telefono','pais','ciudad','estado'];

    //relacion con medicamento
    public function medicamentos(){
        return $this->hasMany(Medicamento::class,'id');
    }
}
