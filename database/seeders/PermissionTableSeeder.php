<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => 1,
                'name' => 'dashboard.view',
                'group' => 'dashboard',
            ],
            [
                'id' => 2,
                'name' => 'users.view',
                'group' => 'users',
            ],
            [
                'id' => 3,
                'name' => 'users.create',
                'group' => 'users',
            ],
            [
                'id' => 4,
                'name' => 'users.edit',
                'group' => 'users',
            ],
            [
                'id' => 5,
                'name' => 'users.delete',
                'group' => 'users',
            ],
            [
                'id' => 6,
                'name' => 'users.toggle_status',
                'group' => 'users',
            ],
            [
                'id' => 7,
                'name' => 'users.change_password',
                'group' => 'users',
            ],
            [
                'id' => 8,
                'name' => 'roles.view',
                'group' => 'roles',
            ],
            [
                'id' => 9,
                'name' => 'roles.create',
                'group' => 'roles',
            ],
            [
                'id' => 10,
                'name' => 'roles.edit',
                'group' => 'roles',
            ],
            [
                'id' => 11,
                'name' => 'roles.delete',
                'group' => 'roles',
            ],
            [
                'id' => 12,
                'name' => 'roles.assign',
                'group' => 'roles',
            ],
            [
                'id' => 13,
                'name' => 'wards.view',
                'group' => 'wards',
            ],
            [
                'id' => 14,
                'name' => 'wards.create',
                'group' => 'wards',
            ],
            [
                'id' => 15,
                'name' => 'wards.edit',
                'group' => 'wards',
            ],
            [
                'id' => 16,
                'name' => 'wards.delete',
                'group' => 'wards',
            ],
            [
                'id' => 17,
                'name' => 'vehicle-types.view',
                'group' => 'vehicle-types',
            ],
            [
                'id' => 18,
                'name' => 'vehicle-types.create',
                'group' => 'vehicle-types',
            ],
            [
                'id' => 19,
                'name' => 'vehicle-types.edit',
                'group' => 'vehicle-types',
            ],
            [
                'id' => 20,
                'name' => 'vehicle-types.delete',
                'group' => 'vehicle-types',
            ],
            [
                'id' => 21,
                'name' => 'masters.view',
                'group' => 'masters',
            ],
            [
                'id' => 22,
                'name' => 'location.view',
                'group' => 'location',
            ],
            [
                'id' => 23,
                'name' => 'location.create',
                'group' => 'location',
            ],
            [
                'id' => 24,
                'name' => 'location.edit',
                'group' => 'location',
            ],
            [
                'id' => 25,
                'name' => 'location.delete',
                'group' => 'location',
            ],
            [
                'id' => 26,
                'name' => 'expenses.view',
                'group' => 'expenses',
            ],
            [
                'id' => 27,
                'name' => 'expenses.create',
                'group' => 'expenses',
            ],
            [
                'id' => 28,
                'name' => 'expenses.edit',
                'group' => 'expenses',
            ],
            [
                'id' => 29,
                'name' => 'expenses.delete',
                'group' => 'expenses',
            ],
            [
                'id' => 30,
                'name' => 'commission.view',
                'group' => 'commission',
            ],
            [
                'id' => 31,
                'name' => 'commission.create',
                'group' => 'commission',
            ],
            [
                'id' => 32,
                'name' => 'commission.edit',
                'group' => 'commission',
            ],
            [
                'id' => 33,
                'name' => 'commission.delete',
                'group' => 'commission',
            ],
            [
                'id' => 34,
                'name' => 'salestag.view',
                'group' => 'salestag',
            ],
            [
                'id' => 35,
                'name' => 'salestag.create',
                'group' => 'salestag',
            ],
            [
                'id' => 36,
                'name' => 'salestag.edit',
                'group' => 'salestag',
            ],
            [
                'id' => 37,
                'name' => 'salestag.delete',
                'group' => 'salestag',
            ],


        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'id' => $permission['id']
            ], [
                'id' => $permission['id'],
                'name' => $permission['name'],
                'group' => $permission['group']
            ]);
        }
    }
}
