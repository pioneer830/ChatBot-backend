<?php

namespace Database\Seeders;

use App\Models\CharacterLength;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('character_lengths')->truncate();
        $valueArray = ["Auto", "Short", "Medium", "long"];
        $records = [];
        foreach ($valueArray as $key => $value) {
            $records[] = [
                'name' => $value
            ];
        }

        CharacterLength::insert($records);
    }
}
