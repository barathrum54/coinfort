<?php

namespace Database\Factories;

use App\Models\AdsType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdsTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdsType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = array("Banner Section 1","Banner Section 2","Popup Ad");
        return["type"=>$array[2]];

    }
}
