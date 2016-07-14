<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(PercentTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(PurchaseTypeTableSeeder::class);
        $this->call(PlansTypeTableSeeder::class);
        $this->call(PlansTableSeeder::class);
    }
}
