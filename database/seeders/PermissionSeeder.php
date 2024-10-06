<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'user.index'            => ['admin'],
            'user.create'           => ['admin'],
            'user.edit'             => ['admin'],
            'user.delete'           => ['admin'],
            'user.resetpassword'    => ['admin'],
            'user.setactive'        => ['admin'],
            'home'                  => ['user', 'guest', 'admin'],
            'about'                 => ['user', 'guest', 'admin'],
            'profile'               => ['user', 'guest', 'admin'],
            'database'              => [],
            'role.index'            => [],
            'role.create'           => [],
            'role.edit'             => [],
            'role.delete'           => [],
            'role.setpermission'    => [],
            'permission.index'      => [],
            'permission.create'     => [],
            'permission.edit'       => [],
            'permission.delete'     => [],
        ];

        foreach ($datas as $data => $roles) {
            $permission = Permission::updateOrCreate(['name' => $data]);

            if (count($roles) > 0) {
                foreach ($roles as $role) {
                    $permission->assignRole($role);
                }
            }
        }
    }
}
