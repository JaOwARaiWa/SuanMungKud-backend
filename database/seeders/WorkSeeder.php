<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-10-29",
                'assign_by' => 1,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-10-30",
                'assign_by' => 2,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-10-31",
                'assign_by' => 3,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-11-01",
                'assign_by' => 1,
            ],
        ];

        foreach($works as $work){
            Work::create($work);
        }
    }
}
