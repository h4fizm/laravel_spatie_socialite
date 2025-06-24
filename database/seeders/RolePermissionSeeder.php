<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permission
        $permissions = [
            'view_admin_page1',
            'view_admin_page2',
            'view_admin_page3',
            'view_customer_page1',
            'view_customer_page2',
            'view_customer_page3',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat role
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $customer = Role::firstOrCreate(['name' => 'customer']);

        // Assign permission ke role
        $admin->givePermissionTo($permissions);
        $customer->givePermissionTo([
            'view_customer_page1',
            'view_customer_page2',
            'view_customer_page3',
        ]);
    }
}
