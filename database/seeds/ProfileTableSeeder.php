<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileTableSeeder
 */
class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->delete();

        Model::unguard();

        \App\Models\Profile::create(array(
            'user_id' => 1,
            'name' => 'Test',
            'last_name' => 'User',
            'phone' => '06300200031',
            'wallet' => 'elcoinwallet1234567890',
            'about' => 'Admin'
        ));

        Model::reguard();
    }
}
