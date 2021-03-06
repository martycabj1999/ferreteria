<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Una categoria tiene muchos productos
    //Relacion Uno a muchos, lado de uno
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute() {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->$featured_image_url;
    }
}
