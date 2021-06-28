<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends User
{
    //
    public function compras(){
        return $this->hasMany(Compra::class);
    }
    public function reservas(){
        return $this->hasMany(HasMany::class);
    }
}
