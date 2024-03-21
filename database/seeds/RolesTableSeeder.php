<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'admin';
        $role_admin->save();
        $role_agent = new Role();
        $role_agent->name = 'agent';
        $role_agent->description = 'agent';
        $role_agent->save();
    }
}
