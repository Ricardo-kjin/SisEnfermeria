<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    //
    public function enfermeras(){
        return $this->belongsToMany(Enfermera::class,'turno_user');
    }
}
