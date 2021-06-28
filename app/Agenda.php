<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    public function enfermeras(){
        return $this->belongsTo(Enfermera::class);
    }

}
