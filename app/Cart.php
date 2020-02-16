<?php

namespace App;

use App\CartDetail;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function details(){
        return $this->hasMany(CartDetail::class);
    }

    //Un carrito tiene un solo estado
    //Relacion Uno a muchos, lado de muchos
    public function state(){
        return $this->belongsTo(State::class);
    }
}
