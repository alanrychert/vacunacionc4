<?php

namespace Database\Seeders;

use App\Models\Batch;
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
            'type_code' => '1', 
            'days_between_doses' => '28', 
        ]);
        TypeOfVaccine::create([
            'name' => 'AstraZeneca', 
            'type_code' => '2', 
            'days_between_doses' => '84', 
        ]);
        TypeOfVaccine::create([
            'name' => 'Sputnik V', 
            'type_code' => '3', 
            'days_between_doses' => '84', 
        ]);
        TypeOfVaccine::create([
            'name' => 'Moderna', 
            'type_code' => '4', 
            'days_between_doses' => '84', 
        ]);
    }
}
