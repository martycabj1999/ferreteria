<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'Activo',
            'description' => '',
        ]);

        State::create([
            'name' => 'Pendiente',
            'description' => '',
        ]);

        State::create([
            'name' => 'Inactivo',
            'description' => '',
        ]);
    }
}
