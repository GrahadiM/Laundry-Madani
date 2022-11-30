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
        $role = Role::create(['name' => 'customer']);
        $permissions = [
            'transaction-list',
            'history-list',
        ];
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

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
