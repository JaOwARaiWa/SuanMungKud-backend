<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
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
                'name' => 'Suan Mungkud',
                'email' => 'admin@suan.com',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
                'telephone' => '0987654321',
                'bank_account' => '0123456789',
            ],
            [
                'name' => 'Tungjai Tumngan',
                'email' => 'employee1@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0808808080',
                'bank_account' => '7894561230',
            ],
            [
                'name' => 'Jaidee Susu',
                'email' => 'employee2@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0606606060',
                'bank_account' => '7410852963',
            ],
            [
                'name' => 'Tumngan Haamoney',
                'email' => 'employee3@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0868968986',
                'bank_account' => '0321654987',
            ],
            [
                'name' => 'Pai Tumngan',
                'email' => 'employee4@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0986989868',
                'bank_account' => '0123456789',
            ],
            [
                'name' => 'Tumsuan Tumna',
                'email' => 'employee5@suan.com',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYEE',
                'telephone' => '0909909090',
                'bank_account' => '9876543210',
            ],
        ];
    }
}
