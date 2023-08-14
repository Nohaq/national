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
        \App\Models\User::factory(3)->create();
        \App\Models\Category::factory(2)->create();
        \App\Models\Collage::factory(6)->create();
        \App\Models\Specialization::factory(5)->create();
        \App\Models\Code::factory(1)->create();
        \App\Models\Term::factory(3)->create();
        \App\Models\Question::factory(10)->create();
        \App\Models\Answer::factory(40)->create();
        \App\Models\Subject::factory(8)->create();
        // \App\Models\Favorite::factory(5)->create();



        

    }
}
