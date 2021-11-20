<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageUser = new Permission();
        $manageUser->title = 'Manage users';
        $manageUser->slug = 'manage-users';
        $manageUser->save();

        $createProduct = new Permission();
        $createProduct->title = 'Create product';
        $createProduct->slug = 'create-product';
        $createProduct->save();

        $shopping = new Permission();
        $shopping->title = 'Shopping';
        $shopping->slug = 'shopping';
        $shopping->save();
    }
}
