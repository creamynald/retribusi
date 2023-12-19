<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        // create UPT roles and assign existing permissions
        $upt = Role::create(['name' => 'upt']);
        $upt->givePermissionTo('create', 'read', 'update', 'delete');

        // create OPD roles and assign existing permissions
        $opd = Role::create(['name' => 'opd']);
        $opd->givePermissionTo('read');

        // create ADMIN roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $opd->givePermissionTo('read');

        $super_admin = Role::create(['name' => 'super admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $create_user_super_admin = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@retribusi.test',
        ]);
        $create_user_super_admin->assignRole($super_admin);

        $create_user_admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@retribusi.test',
        ]);
        $create_user_admin->assignRole($admin);
        
        $create_user_opd = \App\Models\User::factory()->create([
            'name' => 'Example OPD',
            'email' => 'opd@retribusi.test',
            'opd_id' => '1',
        ]);
        $create_user_opd->assignRole($opd);
        
        $create_user_upt = \App\Models\User::factory()->create([
            'name' => 'Example UPT',
            'email' => 'upt@retribusi.test',
            'opd_id' => '1',
            'upt_id' => '1',
        ]);
        $create_user_upt->assignRole($upt);
    }
}
