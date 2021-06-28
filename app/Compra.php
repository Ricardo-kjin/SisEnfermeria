<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function pacientes(){
        return $this->belongsTo(Paciente::class);
    }

    public function servicios(){
        return $this->belongsToMany(Servicio::class,'compra_servicio');
    }

}
