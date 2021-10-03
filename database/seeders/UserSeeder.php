<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'email' => 'carolinasiracusa3@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        User::create([
            'name' => 'Minister',
            'email' => 'ringhetti.franco@gmail.com',
            'password' => bcrypt('1234'),
        ])->assignRole('Minister');
    }
}
