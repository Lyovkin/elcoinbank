<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->delete();

        Model::unguard();

        $users = User::all();

        foreach ($users as $user) {
            DB::table('wallets')->insert([
                ['user_id' => $user->id, 'wallet' => 'teeeeeeessss324324sdqqw33st']
            ]);
        }

        Model::reguard();
    }
}
