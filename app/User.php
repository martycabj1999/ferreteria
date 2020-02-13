<?php

namespace App;
use App\Cart;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function getCartIdAttribute(){
        $cart = $this->carts()->where('status_id', 1)->first();
        if($cart){
            return $cart;
        } else {
            $cart = new Cart();
            $cart->status_id = 1;
            $cart->user_id = $this->id;
            $cart->save();
            return $cart;
        }
    }
}
