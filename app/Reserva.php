<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    public function pacientes(){
        return $this->belongsTo(Paciente::class);
    }
    public function servicios(){
        return $this->belongsToMany(Servicio::class,'reserva_servicio');
    }

}
