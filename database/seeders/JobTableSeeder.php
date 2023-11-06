<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $records = [
            ['id' => 1, 'name' => 'Executive Secretary'],
            ['id' => 2, 'name' => 'Senior Developer'],
            ['id' => 3, 'name' => 'Actuary'],
            ['id' => 4, 'name' => 'Business Systems Development Analyst'],
            ['id' => 5, 'name' => 'Internal Auditor'],
            ['id' => 6, 'name' => 'Recruiter'],
            ['id' => 7, 'name' => 'Paralegal'],
            ['id' => 8, 'name' => 'EOffice Assistant I'],
            ['id' => 9, 'name' => 'Programmer Analyst I'],
            ['id' => 10, 'name' => 'Product Engineer'],
        ];

        Job::insert($records);
    }
}
