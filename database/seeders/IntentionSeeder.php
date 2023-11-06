<?php

namespace Database\Seeders;

use App\Models\Intention;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('intentions')->truncate();
        $valueArray = ["Set a time to follow up", "Set an appointment", "Handle an objection",
                       "Answer a question", "Gather information", "Build rapport"];
        $records = [];
        foreach ($valueArray as $key => $value) {
            $records[] = [
                'name' => $value
            ];
        }
        Intention::insert($records);
    }
}
