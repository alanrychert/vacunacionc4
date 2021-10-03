<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleMin = Role::create(['name' => 'Minister']);
        $roleAdmin = Role::create(['name' => 'Administrator']);
        $roleOp = Role::create(['name' => 'Operator']);

        //Permisos ministro
        Permission::create(['name' => 'admin.create']);
        Permission::create(['name' => 'admin.modify']);
        Permission::create(['name' => 'admin.delete']);
        Permission::create(['name' => 'filters']);

        //Permisos administrador
        Permission::create(['name' => 'lot.load']);
        Permission::create(['name' => 'operator.create']);
        Permission::create(['name' => 'operator.modify']);
        Permission::create(['name' => 'operator.delete']);
        Permission::create(['name' => 'regionalInfo']);

        //Permisos operario
        Permission::create(['name' => 'vaccinated.load']);
    }
}
