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
        $baires_id = Province::where('name','=','Buenos Aires')->first()->province_id;
        $chubut_id = Province::where('name','=','Chubut')->first()->province_id;
        $salta_id = Province::where('name','=','Salta')->first()->province_id;
        SanitaryRegion::create([
            'name' => 'Region Sanitaria I',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria II',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria III',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria IV',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria V',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VI',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VII',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria VIII',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria IX',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria X',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria XI',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria XII',
            'province_id' => $baires_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria I',
            'province_id' => $chubut_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria II',
            'province_id' => $chubut_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria III',
            'province_id' => $chubut_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria I',
            'province_id' => $salta_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria II',
            'province_id' => $salta_id
        ]);
        SanitaryRegion::create([
            'name' => 'Region Sanitaria III',
            'province_id' => $salta_id
        ]);
    }
}
