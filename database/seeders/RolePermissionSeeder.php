<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $admin = Role::create(['name' => 'Admin']);
        $teacher = Role::create(['name' => 'Teacher']);
        $student = Role::create(['name' => 'Student']);
        $parent = Role::create(['name' => 'Parent']);

        // Create Permissions
        $permissions = [
            'permission.create',
            'permission.view',
            'permission.approve',
            'permission.delete'
        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());
        $teacher->givePermissionTo(['permission.create','permission.view','permission.approve']);
        $student->givePermissionTo(['permission.create','permission.view']);
        $parent->givePermissionTo(['permission.view']);
    }
}
