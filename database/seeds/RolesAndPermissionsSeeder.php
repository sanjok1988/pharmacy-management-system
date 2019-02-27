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
        // Permission::create(['name' => 'edit-product']);
        // Permission::create(['name' => 'delete-product']);
        // Permission::create(['name' => 'list-product']);
        // Permission::create(['name' => 'create-product']);


        // $role = Role::create(['name' => 'admin']);
        // $role->givePermissionTo(Permission::all());
        Role::create(['name' => 'customer']);
    }
}
