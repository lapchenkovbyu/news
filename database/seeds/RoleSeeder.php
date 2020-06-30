<?php

use App\Support\ACL\Permissions;
use App\Support\ACL\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => Roles::ADMIN]);

        $create_article_permission = Permission::create(['name'=>Permissions::CREATE_ARTICLE]);

        $create_article_permission->assignRole($admin_role);
    }
}
