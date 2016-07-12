<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;

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
        DB::table('course')->delete();

        Model::unguard();

        $currencies = Currency::all()->toArray();

        DB::table('course')->insert([
            ['currency_id' => $currencies[0]['id'], 'course_purchase' => 0.01, 'course_sell' => 0.07],
            ['currency_id' => $currencies[1]['id'], 'course_purchase' => 2.0, 'course_sell' => 5.0],
            ['currency_id' => $currencies[2]['id'], 'course_purchase' => 3.03, 'course_sell' => 0.15],
            ['currency_id' => $currencies[3]['id'], 'course_purchase' => 2.0, 'course_sell' => 5.0],
            ['currency_id' => $currencies[4]['id'], 'course_purchase' => 2.5, 'course_sell' => 4.8],
            ['currency_id' => $currencies[5]['id'], 'course_purchase' => 2.0, 'course_sell' => 5.0],
            ['currency_id' => $currencies[6]['id'], 'course_purchase' => 0.01, 'course_sell' => 0.33],
            ['currency_id' => $currencies[7]['id'], 'course_purchase' => 0.03, 'course_sell' => 0.07],
            ['currency_id' => $currencies[8]['id'], 'course_purchase' => 0.01, 'course_sell' => 0.3],
            ['currency_id' => $currencies[9]['id'], 'course_purchase' => 1.7, 'course_sell' => 3.04],
        ]);

        Model::reguard();

    }
}
