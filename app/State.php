<?php

namespace App;

use App\Cart;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //validar
    public static $messages = [
        'name:required' => 'Debe ingresar un nombre',
        'name:min' => 'Debe ingresar un nombre de minimo 3 caracteres'
    ];

    public static $rules = [
        'name' => 'required|min:3'
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    ///Un estado tiene muchos carritos
    //Relacion Uno a muchos, lado de uno
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
