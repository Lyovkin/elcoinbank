<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Config;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Admin',
            'blocked' => 0,
            'balance' => 0,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\Models\User::class, 30)->create();
    }
}