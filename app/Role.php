<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
    
    //Un rol tiene muchos usuarios
    //Relacion Uno a muchos, lado de uno
    public function users(){
        return $this->hasMany(User::class);
    }
}
