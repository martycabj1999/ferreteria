<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{
    //validar
    public static $messages = [
        'color_primary:required' => 'Debe ingresar un color primario',
        'color_secondary:required' => 'Debe ingresar un color secundario',
        'text_primary:required' => 'Debe ingresar una fuente primaria',
        'text_secondary:required' => 'Debe ingresar un fuente secundaria',
        'language:required' => 'Debe ingresar un lenguaje',
        'company_id:required' => 'Debe ingresar una compañia',
    ];

    public static $rules = [
        'color_primary' => 'required|min:3',
        'color_secondary' => 'required|min:3',
        'text_primary' => 'required|min:3',
        'text_secondary' => 'required|min:3',
        'language' => 'required|min:3',
        'company_id' => 'required'
    ];

    protected $fillable = [
        'color_primary',
        'color_secondary',
        'text_primary',
        'text_secondary',
        'language',
        'company_id',
    ];
    
    //Una Customization tiene un compañia
    //Relacion Uno a Uno
    public function companies(){
        return $this->hasOne(Company::class);
    }
}
