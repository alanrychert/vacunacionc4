<?php

namespace Database\Factories;

use App\Models\SanitaryRegion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SanitaryRegion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $discipline->name.' by: '. $tutor->name ,
        ];
    }
}
