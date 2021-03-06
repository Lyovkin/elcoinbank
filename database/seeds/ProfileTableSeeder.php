<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Wallet;

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

        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'wallet' => 'asdasdadadadadadad',
                'about' => 'Site administrator.'
            ],
            [
                'user_id' => 2,
                'wallet' => 'asdasdadadadadadad',
                'about' => 'Supervisor.'
            ],
            [
                'user_id' => 3,
                'wallet' => 'asdasdadadadadadad',
                'about' => 'Supervisor.'
            ],
            [
                'user_id' => 4,
                'wallet' => 'asdasdadadadadadad',
                'about' => 'User'
            ]
        ]);

        Model::reguard();
    }
}
