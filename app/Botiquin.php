<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Botiquin extends Model
{
    public function medicamentos(){
        return $this->belongsToMany(Medicamento::class,'botiquin_medicamento');
    }
    public function instrumentos(){
        return $this->belongsToMany(Instrumento::class,'botiquin_instrumento');
    }
    public function insumos(){
        return $this->belongsToMany(Medicamento::class,'botiquin_insumo');
    }
    public function servicios(){
        return $this->belongsTo(Servicio::class,);
    }
}
