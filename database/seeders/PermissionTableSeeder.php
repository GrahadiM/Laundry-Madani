<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'transaction-list',
            'history-list',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'package-list',
            'package-create',
            'package-edit',
            'package-delete',
            'clothes-list',
            'clothes-create',
            'clothes-edit',
            'clothes-delete',
            'transactions-list',
            'transactions-create',
            'transactions-edit',
            'transactions-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
