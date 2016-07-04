<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserRolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users_roles')->delete();

        Model::unguard();

        DB::table('users_roles')->insert(
        array(
            array('user_id' => '1','role_id' => 1,'created_at' => 'NOW()',
            'updated_at' => 'NOW()'),
            array('user_id' => '2','role_id' => 2,'created_at' => 'NOW()',
                'updated_at' => 'NOW()'),
            array('user_id' => '3','role_id' => 2,'created_at' => 'NOW()',
                'updated_at' => 'NOW()'),
            array('user_id' => '4','role_id' => 3,'created_at' => 'NOW()',
                'updated_at' => 'NOW()'),
        ));

        Model::reguard();
        
    }

}