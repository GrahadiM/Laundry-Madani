<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Customer',
            'email' => 'customer@test.com',
            'username' => 'customer',
            'avatar' => 'default-user.jpg',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $roleUser = Role::create(['name' => 'customer']);
        $permissions = [
            'transaction-list',
            'history-list',
        ];
        $roleUser->syncPermissions($permissions);
        $user->assignRole([$roleUser->id]);

        $pegawai = User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@test.com',
            'username' => 'pegawai',
            'avatar' => 'default-user.jpg',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $rolePegawai = Role::create(['name' => 'pegawai']);
        $permissions = [
            'transaction-list',
            'history-list',
            'clothes-list',
            'clothes-create',
            'clothes-edit',
            'clothes-delete',
            'transactions-list',
            'transactions-create',
            'transactions-edit',
            'transactions-delete',
        ];
        $rolePegawai->syncPermissions($permissions);
        $pegawai->assignRole([$rolePegawai->id]);

        // $users = [];
        // $faker = Factory::create();
        // for($i=0;$i<15;$i++){
        // $data[$i] = [
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'username' => $faker->unique()->userName,
        //         'email_verified_at' => now(),
        //         'avatar' => 'default-user.jpg',
        //         'password' => bcrypt('password'),
        //         'remember_token' => Str::random(10),
        //     ];
        // }
        // DB::table('users')->insert($data);
    }
}
