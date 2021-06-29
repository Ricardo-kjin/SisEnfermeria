<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function enfermeras(){
        return $this->belongsToMany(Enfermera::class,'servicio_user');
    }
    public function reservas(){
        return $this->belongsToMany(Reserva::class,'reserva_servicio');
    }
    public function compras(){
        return $this->belongsToMany(Compra::class,'compra_servicio');
    }
    public function botiquins(){
        return $this->hasOne(Botiquin::class);
    }
}
