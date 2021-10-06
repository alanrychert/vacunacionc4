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
        SanitaryRegion::create([
            'name' => 'Region Sanitaria I',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria II',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria III',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria IV',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria V',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VI',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VII',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VIII',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria IX',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria X',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria XI',
            'province' => 'Buenos Aires'
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria XII',
            'province' => 'Buenos Aires'
        ]);
    }
}
