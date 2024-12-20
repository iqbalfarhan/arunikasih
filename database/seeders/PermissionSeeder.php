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
            'home'                  => ['user', 'guest', 'admin'],
            'about'                 => ['user', 'guest', 'admin'],
            'profile'               => ['user', 'guest', 'admin'],
            'database'              => [],
            'datamaster'            => [],

            'user.index'            => ['admin'],
            'user.create'           => ['admin'],
            'user.edit'             => ['admin'],
            'user.delete'           => ['admin'],
            'user.resetpassword'    => ['admin'],
            'user.setactive'        => ['admin'],

            'role.index'            => [],
            'role.create'           => [],
            'role.edit'             => [],
            'role.delete'           => [],
            'role.setpermission'    => [],

            'permission.index'      => [],
            'permission.create'     => [],
            'permission.edit'       => [],
            'permission.delete'     => [],

            'rating.index'          => [],
            'rating.create'         => ['user'],
            'rating.edit'           => ['user'],
            'rating.delete'         => ['user'],
            'rating.mine'           => ['user'],

            'tamu.index'            => ['user'],
            'tamu.create'           => ['user'],
            'tamu.edit'             => ['user'],
            'tamu.delete'           => ['user'],
            'tamu.share'            => ['user'],

            'undangan.index'        => [],
            'undangan.create'       => ['user'],
            'undangan.edit'         => ['user'],
            'undangan.delete'       => ['user'],
            'undangan.show'         => ['user'],
            'undangan.mine'         => ['user'],

            'pembayaran.index'      => ['user'],
            'pembayaran.edit'       => [],
            'pembayaran.delete'     => [],
            'pembayaran.show'       => ['user'],
            'pembayaran.mine'       => ['user'],
            'pembayaran.confirm'    => [],

            'notif.index'           => ['user'],
            'notif.edit'            => [],
            'notif.delete'          => ['user'],
            'notif.show'            => ['user'],
            'notif.read'            => ['user'],

            'pengantin.index'       => ['user'],
            'pengantin.create'      => ['user'],
            'pengantin.edit'        => ['user'],
            'pengantin.delete'      => ['user'],

            'event.index'           => ['user'],
            'event.create'          => ['user'],
            'event.edit'            => ['user'],
            'event.delete'          => ['user'],

            'gallery.index'         => ['user'],
            'gallery.create'        => ['user'],
            'gallery.edit'          => ['user'],
            'gallery.delete'        => ['user'],

            'kisah.index'           => ['user'],
            'kisah.create'          => ['user'],
            'kisah.edit'            => ['user'],
            'kisah.delete'          => ['user'],

            'streaming.index'       => ['user'],
            'streaming.create'      => ['user'],
            'streaming.edit'        => ['user'],
            'streaming.delete'      => ['user'],

            'hadiah.index'          => ['user'],
            'hadiah.create'         => ['user'],
            'hadiah.edit'           => ['user'],
            'hadiah.delete'         => ['user'],
        ];

        foreach ($datas as $data => $roles) {
            $permission = Permission::updateOrCreate(['name' => $data]);

            if (count($roles) > 0) {
                $permission->syncRoles($roles);
            }
        }
    }
}
