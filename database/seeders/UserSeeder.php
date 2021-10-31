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
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            [
                'name' => 'First',
                'email' => 'employee0@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0987654321',
                'bank_account' => '1234567890',
            ],
            [
                'name' => 'Ping',
                'email' => 'employee1@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0900000000',
                'bank_account' => '9876543210',
            ],
            [
                'name' => 'Yo',
                'email' => 'employee2@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0811111111',
                'bank_account' => '7410852963',
            ],
            [
                'name' => 'Tungjai',
                'email' => 'employee3@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0922222222',
                'bank_account' => '0123456789',
            ],
            [
                'name' => 'Tumngan',
                'email' => 'employee4@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0933333333',
                'bank_account' => '7539518624',
            ],
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            [
                'name' => 'ผู้รับซื้อรายใหญ่',
                'email' => 'partner0@suan.com',
                'password' => bcrypt('password'),
                'role' => 'PARTNER',
                'telephone' => '0844444444',
                'bank_account' => '9638527410',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
