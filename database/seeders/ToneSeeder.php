<?php

namespace Database\Seeders;

use App\Models\Tone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tones')->truncate();
        $valueArray = ["Professional", "Enthusiastic", "Persuasive", "Empathetic", "Confident",
                      "Straightforward", "Casual", "Relatable", "Educational", "Formal", "Amicable"];
        $records = [];
        foreach ($valueArray as $key => $value) {
            $records[] = [
                'name' => $value
            ];
        }
        Tone::insert($records);
    }
}
