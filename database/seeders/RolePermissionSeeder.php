<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles
        $roleGod = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);



        //Permissions
        $permissions = [
            'dashboard.view',

            //permissions names for admins
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',

            //permissions names for role
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',
            //permissions names for setting
            'global.setting',
            'speech.view',
            'notice.view',
            'notice.create',
            'notice.edit',
            'notice.delete',
            //permissions names for Slider
            'slider.view',
            'slider.create',
            'slider.edit',
            'slider.delete',

        ];




        //Create and Assign Premission for admin
        for ($i = 0; $i < count($permissions); $i++) {
            //Create Permission
            $permission = Permission::create(['name' => $permissions[$i], 'guard_name' => 'admin']);

            //Assign Permission to a Role
            $roleGod->givePermissionTo($permission);
        }

    }
}
