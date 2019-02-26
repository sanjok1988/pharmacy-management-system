<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit employee']);
        // Permission::create(['name' => 'delete-employee']);
        // Permission::create(['name' => 'list-employee']);
        // Permission::create(['name' => 'create-employee']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('edit-employee');

        // or may be done by chaining
        $role = Role::create(['name' => 'hr'])
            ->givePermissionTo(['list-employee', 'create-employee']);

        $role = Role::create(['name' => 'employee']);
        $role->givePermissionTo(Permission::all());
    }
}
