<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'last_name' => 'istrador',
            'dni' => '40735330',
            'user' => 'administrador',
            'email' => 'carolinasiracusa3@gmail.com',
            'sanitary_region' => '1',
            'password' => bcrypt('1234'),
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Minister',
            'last_name' => 'ringhetti',
            'dni' => '40735331',
            'user' => 'ministro',
            'email' => 'ringhetti.franco@gmail.com',
            'sanitary_region' => '2',
            'password' => bcrypt('1234'),
        ])->assignRole('Minister');
    }
}