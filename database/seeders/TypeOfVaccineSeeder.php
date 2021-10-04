<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeOfVaccine;

class TypeOfVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfVaccine::create([
            'name' => 'Sinopharm', 
            'preffix_code' => '1', 
            'days_between_doses' => '28', 
        ]);
        TypeOfVaccine::create([
            'name' => 'AstraZeneca', 
            'preffix_code' => '2', 
            'days_between_doses' => '84', 
        ]);
        TypeOfVaccine::create([
            'name' => 'Sputnik V', 
            'preffix_code' => '3', 
            'days_between_doses' => '84', 
        ]);
        TypeOfVaccine::create([
            'name' => 'Moderna', 
            'preffix_code' => '4', 
            'days_between_doses' => '84', 
        ]);
    }
}
