<?php

use Illuminate\Database\Seeder;
use App\Models\PlansType;

/**
 * Class PlansTypeTableSeeder
 */
class PlansTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlansType::create(['name' => 'Пополнение баланса ElCoin']);
        PlansType::create(['name' => 'Покупка ElCoin']);
    }
}
