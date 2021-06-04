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
        $role = Role::create(['name' => 'Root']);
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'posts.get'])->syncRoles([$role]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$role, $role1]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$role, $role1]);
        Permission::create(['name' => 'posts.destroy'])->syncRoles([$role]);

    }
}
