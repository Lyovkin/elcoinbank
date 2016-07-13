<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            ['percent'=> 10, 'days' => 10, 'type_id' => 1],
            ['percent'=> 15, 'days' => 30, 'type_id' => 1],
            ['percent'=> 20, 'days' => 60, 'type_id' => 1],
            ['percent'=> 3, 'days' => 10, 'type_id' => 2],
            ['percent'=> 5, 'days' => 30, 'type_id' => 2],
            ['percent'=> 7, 'days' => 60, 'type_id' => 2],
        ]);
    }
}
