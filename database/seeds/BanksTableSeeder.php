<?php

use Illuminate\Database\Seeder;
use App\Models\BanksProfiles;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b_p1 = BanksProfiles::create(['type' => 'Общий', 'key' => 1]);
        $b_p2 = BanksProfiles::create(['type' => 'Доверительный', 'key' => 0]);

        $b_p1->bank()->create(['amount' => 10000]);
        $b_p2->bank()->create(['amount' => 300]);

    }
}
