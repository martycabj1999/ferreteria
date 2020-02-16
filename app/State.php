<?php

namespace App;

use App\Cart;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    ///Un estado tiene muchos carritos
    //Relacion Uno a muchos, lado de uno
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
