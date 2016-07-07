<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        Model::unguard();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'user']);

        Model::reguard();
    }

}