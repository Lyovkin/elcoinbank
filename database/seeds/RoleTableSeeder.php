<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        Model::unguard();

        \App\Models\Role::create(['name' => 'admin']);
        \App\Models\Role::create(['name' => 'supervisor']);
        \App\Models\Role::create(['name' => 'user']);

        Model::reguard();
    }

}