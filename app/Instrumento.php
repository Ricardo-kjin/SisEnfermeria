<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    public function botiquins(){
        return $this->belongsToMany(Botiquin::class,'botiquin_instrumento');
    }
}
