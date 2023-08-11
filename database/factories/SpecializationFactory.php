<?php

namespace Database\Factories;

use App\Models\Collage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Specialization>
 */
class SpecializationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid'=>Str::uuid(),
            'specialization_name' => $this->faker->name(),
            'collage_id'=>Collage::all()->random()->id,
        ];
    }
}
