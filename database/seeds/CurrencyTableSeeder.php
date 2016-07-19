<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency')->delete();

        Model::unguard();

        DB::table('currency')->insert([
            ['name' => 'Perfect Money EUR'],
            ['name' => 'Payeer RUB'],
            ['name' => 'Advcash USD'],
            ['name' => 'Qiwi RUB'],
            ['name' => 'Банковская Карта RUB'],
            ['name' => 'Яндекс.Деньги RUB'],
            ['name' => 'OKPAY USD'],
            ['name' => 'Perfect Money USD'],
            ['name' => 'OKPAY EUR'],
            ['name' => 'Bitcoin BTC'],
            ['name' => 'ELCOIN']
        ]);

        Model::reguard();
    }
}
