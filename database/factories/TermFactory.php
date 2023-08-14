<?php

namespace Database\Factories;

use App\Models\Collage;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Term>
 */
class TermFactory extends Factory
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
            'term_name' => $this->faker->name(),
            'type'=>$this->faker->randomElement(['master','graduate']),
            'specialization_id'=>Specialization::all()->random()->id,
            'collage_id'=>Collage::all()->random()->id,
        ];
     
      
    }
}
