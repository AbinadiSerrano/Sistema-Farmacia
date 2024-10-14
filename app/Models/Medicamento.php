<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable=['nombre','precio','fecha_vencimiento','indicaciones','laboratorio_id','presentacion_id'];

    //relaciones con laboratorio
    public function laboratorios(){
        return $this->belongsTo(Laboratorio::class,'laboratorio_id');

    }
    //relaciones con presentacion
    public function presentaciones(){
        return $this->belongsTo(Presentacione::class,'presentacion_id');
        
    }
}
