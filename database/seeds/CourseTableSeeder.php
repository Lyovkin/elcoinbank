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

        $faker = Faker\Factory::create();

        $currencies = Currency::all()->toArray();

        DB::table('course')->insert([
            ['currency_id' => $currencies[0]['id'], 'course_purchase' => 0.4, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[1]['id'], 'course_purchase' => 0.3, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[2]['id'], 'course_purchase' => 1.03,'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[3]['id'], 'course_purchase' => 1.7, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[4]['id'], 'course_purchase' => 1.7, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[5]['id'], 'course_purchase' => 1.0, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[6]['id'], 'course_purchase' => 0.1, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[7]['id'], 'course_purchase' => 0.3, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[8]['id'], 'course_purchase' => 0.1, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[9]['id'], 'course_purchase' => 1.7, 'wallet' => $faker->creditCardNumber],
            ['currency_id' => $currencies[10]['id'], 'course_purchase' => 0.0, 'wallet' => $faker->creditCardNumber],
        ]);

        Model::reguard();

    }
}
