<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = new Role();
        $seller->title = 'Seller';
        $seller->slug = 'seller';
        $seller->save();

        $customer = new Role();
        $customer->title = 'Сustomer';
        $customer->slug = 'customer';
        $customer->save();

        $admin = new Role();
        $admin->title = 'Admin';
        $admin->slug = 'admin';
        $admin->save();
    }
}
