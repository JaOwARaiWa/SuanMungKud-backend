<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Kiattikun',
                'email' => 'admin0@suan.com',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
                'telephone' => '0907981187',
                'bank_account' => '6210450032',
            ],
            [
                'name' => 'Suphaphit',
                'email' => 'admin1@suan.com',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
                'telephone' => '0968828238',
                'bank_account' => '6210450466',
            ],
            [
                'name' => 'Yothanat',
                'email' => 'admin2@suan.com',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
                'telephone' => '0889282786',
                'bank_account' => '6210451403',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
