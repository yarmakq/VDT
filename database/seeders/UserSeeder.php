<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = Role::where('slug','seller')->first();
        $customer = Role::where('slug', 'customer')->first();
        $admin = Role::where('slug', 'admin')->first();

        $createProduct = Permission::where('slug','create-product')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();
        $shopping = Permission::where('slug','shopping')->first();

        $user = new User();
        $user->name = 'yarmak';
        $user->email = 'yarmak@list.ru';
        $user->phone = '89999999999';
        $user->password = bcrypt('yarmak123');
        $user->save();
        $user->roles()->attach($admin);
        $user->permissions()->attach($manageUsers);
    }
}
