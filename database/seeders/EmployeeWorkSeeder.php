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
            ],
            [
                'work_id' => 1,
                'user_id' => 5,
            ],
            [
                'work_id' => 1,
                'user_id' => 6,
            ],

            [
                'work_id' => 2,
                'user_id' => 7,
            ],
            [
                'work_id' => 2,
                'user_id' => 8,
            ],

            [
                'work_id' => 3,
                'user_id' => 8,
            ],
            [
                'work_id' => 3,
                'user_id' => 7,
            ],
            [
                'work_id' => 3,
                'user_id' => 6,
            ],

            [
                'work_id' => 4,
                'user_id' => 5,
            ],
            [
                'work_id' => 4,
                'user_id' => 4,
            ],

        ];

        foreach($employee_works as $work){
            Employee_Work::create($work);
        }
    }
}