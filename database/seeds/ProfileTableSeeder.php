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

        $wallets = Wallet::all()->toArray();

        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'wallet_id' => $wallets[0]['id'],
                'about' => 'Site administrator.'
            ],
            [
                'user_id' => 2,
                'wallet_id' => $wallets[1]['id'],
                'about' => 'Supervisor 1.'
            ],
            [
                'user_id' => 3,
                'wallet_id' => $wallets[2]['id'],
                'about' => 'Supervisor 2.'
            ],
            [
                'user_id' => 4,
                'wallet_id' => $wallets[3]['id'],
                'about' => 'user'
            ]
        ]);

        Model::reguard();
    }
}
