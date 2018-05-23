<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $adminRole = Role::where('name', 'Administrator')->first();
        
        $permissions[] = Permission::create([
        	'name' => 'users.manage',
        	'display_name' => 'Manage Users',
        	'description' => 'Manage users and their sessions.',
        ]);
        
        $permissions[] = Permission::create([
        	'name' => 'roles.manage',
        	'display_name' => 'Manage Roles',
        	'description' => 'Manage system roles.',
        ]);
        
        $permissions[] = Permission::create([
        	'name' => 'permissions.manage',
        	'display_name' => 'Manage Permissions',
        	'description' => 'Manage role permissions.',
        ]);
        
        $permissions[] = Permission::create([
        	'name' => 'employees.manage',
        	'display_name' => 'Manage Employees',
        	'description' => 'Manage employees and their information.',
        ]);

        $permissions[] = Permission::create([
        	'name' => 'employees.create',
        	'display_name' => 'Create Employees',
        	'description' => 'Insert employees and their information.',
        ]);

        $permissions[] = Permission::create([
        	'name' => 'employees.edit',
        	'display_name' => 'Edit Employees',
        	'description' => 'Edit employees and their information.',
        ]);

        $permissions[] = Permission::create([
        	'name' => 'employees.delete',
        	'display_name' => 'Delete Employees',
        	'description' => 'Delete employees and their information.',
        ]);

        $permissions[] = Permission::create([
        	'name' => 'employees.export',
        	'display_name' => 'Export Employees',
        	'description' => 'Export employees documents.',        	
        ]);
    }
}
