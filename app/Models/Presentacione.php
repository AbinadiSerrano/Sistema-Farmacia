<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Presentacione extends Model
{
    use HasFactory;

    protected $fillable=['nombre','estado','categoria_id'];

    public function categorias(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    //relacion con medicamento
    public function medicamentos(){
        return $this->hasMany(Medicamento::class,'id');
    }
}
