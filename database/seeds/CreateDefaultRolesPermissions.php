<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class CreateDefaultRolesPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['label' => 'Super Administrator']);

        $permission = Permission::create(['label' => 'Create User']);
        $role->permissions()->save($permission);

        $permission = Permission::create(['label' => 'Update User']);
        $role->permissions()->save($permission);

        $permission = Permission::create(['label' => 'Delete User']);
        $role->permissions()->save($permission);

        $permission = Permission::create(['label' => 'List Users']);
        $role->permissions()->save($permission);

    }
}
