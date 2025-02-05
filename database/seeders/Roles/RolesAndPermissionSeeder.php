<?php

namespace Database\Seeders\Roles;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'all_users',
            'create_user',
            'edit_user',
            'update_user',
            'delete_user',
            'change_user_status',

            'all_customer',
            'create_customer',
            'edit_customer',
            'update_customer',
            'delete_customer',

            'all_products',
            'create_product',
            'edit_product',
            'update_product',
            'delete_product',

            'all_product_categorys',
            'create_product_category',
            'edit_product_category',
            'update_product_category',
            'delete_product_category',

            'all_feedbacks',
            'create_feedback',
            'edit_feedback',
            'update_feedback',
            'delete_feedback',

        ];
        foreach ($permissions as  $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'api',
            ]);
        }

        $superAdmin = Role::create(['name' => 'superAdmin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
