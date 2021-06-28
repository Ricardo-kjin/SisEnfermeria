<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public function botiquin(){
        return $this->belongsToMany(Botiquin::class);
   }
}
