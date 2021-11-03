<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee_Work;

class EmployeeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee_works = [
            [
                'work_id' => 1,
                'user_id' => 4,
                'date' => '2021-10-29'
            ],
            [
                'work_id' => 1,
                'user_id' => 5,
                'date' => '2021-10-29'
            ],
            [
                'work_id' => 1,
                'user_id' => 6,
                'date' => '2021-10-29'
            ],

            [
                'work_id' => 2,
                'user_id' => 7,
                'date' => '2021-10-30'
            ],
            [
                'work_id' => 2,
                'user_id' => 8,
                'date' => '2021-10-30'
            ],

            [
                'work_id' => 3,
                'user_id' => 8,
                'date' => '2021-10-31'
            ],
            [
                'work_id' => 3,
                'user_id' => 7,
                'date' => '2021-10-31'
            ],
            [
                'work_id' => 3,
                'user_id' => 6,
                'date' => '2021-10-31'
            ],

            [
                'work_id' => 4,
                'user_id' => 5,
                'date' => '2021-11-01'
            ],
            [
                'work_id' => 4,
                'user_id' => 4,
                'date' => '2021-11-01'
            ],

        ];

        foreach($employee_works as $work){
            Employee_Work::create($work);
        }
    }
}
