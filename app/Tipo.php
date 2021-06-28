<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    public function medicamentos(){
        return $this->belongsToMany(Medicamento::class,'medicamento_tipo');
    }
}
