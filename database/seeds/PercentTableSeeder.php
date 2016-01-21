<?php

use Illuminate\Database\Seeder;

class PercentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Percent::create(['percent' => 0]);
    }
}
