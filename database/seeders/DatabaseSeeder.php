<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(2)->create();
        \App\Models\Collage::factory(6)->create();
        \App\Models\Specialization::factory(20)->create();
        \App\Models\Code::factory(20)->create();
        \App\Models\Term::factory(20)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Answer::factory(50)->create();
        \App\Models\Code::factory(20)->create();
        \App\Models\Favorite::factory(5)->create();



        

    }
}
