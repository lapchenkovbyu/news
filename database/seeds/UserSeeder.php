<?php

use App\Support\ACL\Roles;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now()
        ]);

        $user = User::create([
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now()
        ]);

        $admin->assignRole(Roles::ADMIN);
    }
}
