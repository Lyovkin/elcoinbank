<?php

use Illuminate\Database\Seeder;
use App\Models\Percent;

class PercentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Percent::create(['percent' => 0]);
    }
}
