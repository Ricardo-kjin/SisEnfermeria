<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    public function enfermeras(){
        return $this->belongsToMany(Enfermera::class,'especialidad_user');
    }
}
