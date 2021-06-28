<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermera extends User
{
    public function especialidads(){
        return $this->belongsToMany(Especialidad::class,'especialidad');
    }
    public function turnos(){
        return $this->belongsToMany(Turno::class,'turno_user');
    }

    public function agendas(){
        return $this->hasOne(Agenda::class);
    }
    public function servicios(){
        return $this->belongsToMany(Servicio::class,'servicio_user');
    }
}
