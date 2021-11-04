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
                'date' => "2021-11-01",
                'assign_by' => 1,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-11-02",
                'assign_by' => 2,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-11-03",
                'assign_by' => 1,
            ],
            [
                'name' => "เก็บผลไม้",
                'date' => "2021-11-04",
                'assign_by' => 2,
            ],
        ];

        foreach($works as $work){
            Work::create($work);
        }
    }
}
