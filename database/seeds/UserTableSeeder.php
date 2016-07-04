<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            ['name' => 'Admin',
                'blocked' => 0,
                'balance' => 0,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('secretPassword127793'),],
            ['name' => 'SuperVisor 1',
                'blocked' => 0,
                'balance' => 0,
                'email' => config('emails.email.supervisor1'),
                'password' => bcrypt('secretSupervisor1'),],
            ['name' => 'SuperVisor 2',
                'blocked' => 0,
                'balance' => 0,
                'email' => config('emails.email.supervisor2'),
                'password' => bcrypt('secretSupervisor2'),],
            ['name' => 'User 1',
                'blocked' => 0,
                'balance' => 0,
                'email' => 'user@gmail.com',
                'password' => bcrypt('secret'),],
        ]);

        //factory(App\Models\User::class, 30)->create();
    }
}