<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

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
                'name' => 'Admin',
                'last_name' => 'Admin',
                'about' => 'Site administrator.'
            ],
            [
                'user_id' => 2,
                'name' => 'Supervisor 1',
                'last_name' => 'Admin',
                'about' => 'Supervisor 1.'
            ],
            [
                'user_id' => 3,
                'name' => 'Supervisor 2',
                'last_name' => 'Admin',
                'about' => 'Supervisor 2.'
            ],
            [
                'user_id' => 4,
                'name' => 'User',
                'last_name' => 'Test',
                'about' => 'user'
            ]
        ]);

        Model::reguard();
    }
}
