<?php

namespace Database\Factories;

use App\Models\Collage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
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
            'subject_name'=>$this->faker->name(),
            'collage_id'=>Collage::all()->random()->id
        ];
    }
}
