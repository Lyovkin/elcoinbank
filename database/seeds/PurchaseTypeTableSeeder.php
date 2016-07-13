<?php

use Illuminate\Database\Seeder;
use App\Models\TypePurchase;

class PurchaseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypePurchase::create(['name' => 'Покупка без дов.управления']);
        TypePurchase::create(['name' => 'Покупка c дов.управлением']);
        TypePurchase::create(['name' => 'Перевод на баланс']);
    }
}
