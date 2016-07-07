<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

/**
 * Class CourseTableSeeder
 */
class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['course' => 0]);
    }
}
