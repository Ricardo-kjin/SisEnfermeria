<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    public function tipos(){
        return $this->belongsToMany(Tipo::class,'medicamento_tipo');
    }
    public function presentacions(){
        return $this->belongsToMany(Presentacion::class,'medicamento_presentacion');
    }
    public function botiquins(){
        return $this->belongsToMany(Botiquin::class,'botiquin_medicamento');
    }
}
