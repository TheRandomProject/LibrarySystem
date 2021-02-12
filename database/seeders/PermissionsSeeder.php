<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list books']);
        Permission::create(['name' => 'view books']);
        Permission::create(['name' => 'create books']);
        Permission::create(['name' => 'update books']);
        Permission::create(['name' => 'delete books']);

        Permission::create(['name' => 'list genres']);
        Permission::create(['name' => 'view genres']);
        Permission::create(['name' => 'create genres']);
        Permission::create(['name' => 'update genres']);
        Permission::create(['name' => 'delete genres']);

        Permission::create(['name' => 'list borrows']);
        Permission::create(['name' => 'view borrows']);
        Permission::create(['name' => 'create borrows']);
        Permission::create(['name' => 'update borrows']);
        Permission::create(['name' => 'delete borrows']);

        Permission::create(['name' => 'list admins']);
        Permission::create(['name' => 'view admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'update admins']);
        Permission::create(['name' => 'delete admins']);

        Permission::create(['name' => 'list librarians']);
        Permission::create(['name' => 'view librarians']);
        Permission::create(['name' => 'create librarians']);
        Permission::create(['name' => 'update librarians']);
        Permission::create(['name' => 'delete librarians']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $student = \App\Models\Student::whereEmail('admin@admin.com')->first();

        if ($student) {
            $student->assignRole($adminRole);
        }
    }
}
