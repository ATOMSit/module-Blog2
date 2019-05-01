<?php

namespace Modules\Blog\Database\Seeders;

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'blog_post_show',
            'blog_post_create',
            'blog_post_update',
            'blog_post_delete',
        ];
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
        $role = Role::findOrCreate('ATOMSit');
        $role->givePermissionTo(Permission::all());
    }
}
