<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin  = Role::where('name', 'admin')->first();
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@crm.page';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
