<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collage>
 */
class CollageFactory extends Factory
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
            'collage_name'=>$this->faker->name(),
            'logo'=>$this->faker->imageUrl(),
            'category_id'=>Category::all()->random()->id
        ];
    }
}
