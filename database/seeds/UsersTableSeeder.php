<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'lastname' => 'add',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'ddi' => 1234,
            'ddn' => 1234,
            'telephone' => 1234,
            'address' => 'sdad',
            'role_id' => 1,
            'state_id' => 1,
            /*'city_id' => 1,*/
        ]);
        User::create([
            'name' => 'vendedor',
            'lastname' => 'add',
            'email' => 'vendedor@gmail.com',
            'password' => bcrypt('1234'),
            'ddi' => 1234,
            'ddn' => 1234,
            'telephone' => 1234,
            'address' => 'sdad',
            'role_id' => 2,
            'state_id' => 1,
            /*'city_id' => 1,*/
        ]);
        User::create([
            'name' => 'cliente',
            'lastname' => 'add',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('1234'),
            'ddi' => 1234,
            'ddn' => 1234,
            'telephone' => 1234,
            'address' => 'sdad',
            'role_id' => 3,
            'state_id' => 1,
            /*'city_id' => 1,*/
        ]);
    }
}
