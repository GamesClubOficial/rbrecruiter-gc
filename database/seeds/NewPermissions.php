<?php

use Illuminate\Database\Seeder;

class NewPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = \Spatie\Permission\Models\Role::create([
           'name' => 'developer'
        ]);

        Permission::create(['name' => 'admin.settings.view']);
        Permission::create(['name' => 'admin.settings.edit']);

        $developer->givePermissionTo('admin.developertools.use');


    }
}