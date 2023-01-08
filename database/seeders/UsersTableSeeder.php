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
        $pegawai = User::create([
            'name' => 'Kurir',
            'email' => 'kurir@test.com',
            'username' => 'kurir',
            'phone' => '81268385500',
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

        $user = User::create([
            'name' => 'Customer',
            'email' => 'customer@test.com',
            'username' => 'customer',
            'address' => 'Jalan Suka Karya No. 80, Tuah Karya, Kecamatan Tampan, Kota Pekanbaru, Riau',
            'phone' => '85767113554',
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
