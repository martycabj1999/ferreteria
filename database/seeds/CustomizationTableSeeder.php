<?php

use Illuminate\Database\Seeder;
use App\Customization;

class CustomizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customization::create([
            'color_primary' => '#00ff00',
            'color_secondary' => '#dd2222',
            'text_primary' => '#000000',
            'text_secondary' => '#ffffff',
            'language' => 'es',
            'company_id' => 1,
        ]);
    }
}
