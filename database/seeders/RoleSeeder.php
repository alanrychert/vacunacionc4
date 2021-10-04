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
        Permission::create(['name' => 'admin.create'])->assignRole($roleMin);
        Permission::create(['name' => 'admin.modify'])->assignRole($roleMin);
        Permission::create(['name' => 'admin.delete'])->assignRole($roleMin);
        Permission::create(['name' => 'filters'])->assignRole($roleMin);

        //Permisos administrador
        Permission::create(['name' => 'lot.load'])->assignRole($roleAdmin);
        Permission::create(['name' => 'operator.create'])->assignRole($roleAdmin);
        Permission::create(['name' => 'operator.modify'])->assignRole($roleAdmin);
        Permission::create(['name' => 'operator.delete'])->assignRole($roleAdmin);
        Permission::create(['name' => 'regionalInfo'])->assignRole($roleAdmin);

        //Permisos operario
        Permission::create(['name' => 'vaccinated.load'])->assignRole($roleOp);
    }
}
