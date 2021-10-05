<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(ProvinceSeeder::class);
        $this->call(SanitaryRecionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeOfVaccineSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
