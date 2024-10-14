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
            'rating.index'          => ['user'],
            'rating.create'         => ['user'],
            'rating.edit'           => ['user'],
            'rating.delete'         => ['user'],
            'rating.mine'           => ['user'],
            'tamu.index'            => ['user'],
            'tamu.create'           => ['user'],
            'tamu.edit'             => ['user'],
            'tamu.delete'           => ['user'],
            'undangan.index'        => ['user'],
            'undangan.create'       => ['user'],
            'undangan.edit'         => ['user'],
            'undangan.delete'       => ['user'],
            'undangan.show'         => ['user'],
            'undangan.mine'         => ['user'],
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
