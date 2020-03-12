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
            /*'city_id' => 1,
            'role_id' => 1,*/
        ]);
    }
}
