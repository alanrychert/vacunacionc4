<?php

namespace Database\Seeders;

use App\Models\SanitaryRegion;
use App\Models\Province;
use Illuminate\Database\Seeder;

class SanitaryRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = Province::all()->first();
        SanitaryRegion::create([
            'name' => 'Region Sanitaria I',
            'code' => 'I',
            'province' => $province->name
        ]);
    }
}
