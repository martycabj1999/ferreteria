<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Company;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'business_name' => 'cliente',
            'cuit' => '20-31879323-7',
            'real_address' => 'av. 123',
            'postal_address' => 'av. 123',
            'quantity_employes' => 15,
            'ddi' => 1234,
            'ddn' => 1234,
            'telephone' => 1234,
            'web' => 'www.titoconstrucciones.com',
            'state_id' => 1,
        ]);
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
            'company_id' => 1,
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
            'company_id' => 1,
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
            'company_id' => 1,
            'state_id' => 1,
            /*'city_id' => 1,*/
        ]);
    }
}
