<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Category::class, 100)->create();
        factory(Product::class, 100)->create();
    }
}
