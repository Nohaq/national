<?php

namespace Database\Factories;

use App\Models\Collage;
use App\Models\Specialization;
use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
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
            'content'=>$this->faker->name,
            'referenc'=>$this->faker->imageUrl,
            'term_id'=>Term::all()->random()->id,
            'subject_id'=>Term::all()->random()->id,
            'specialization_id'=>Specialization::all()->random()->id,
            'collage_id'=>Collage::all()->random()->id
            //
        ];
    }
}
