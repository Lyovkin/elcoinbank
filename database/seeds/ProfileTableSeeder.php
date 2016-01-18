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
            'name' => 'Василий',
            'last_name' => 'Иванов',
            'phone' => '0634406666',
            'wallet' => '32jk2knk2nr2rnr2r23r',
            'about' => 'Site admin'
        ));

        Model::reguard();
    }
}
