<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'admin@user.com';
        $password = 'lolita';
        $admin = 1;

        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->admin = $admin;
        $user->save();
    }
}
