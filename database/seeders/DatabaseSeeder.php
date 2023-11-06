<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(ToneSeeder::class);
        $this->call(IntentionSeeder::class);
        $this->call(CharacterLengthSeeder::class);
        $this->call(PlanTableSeeder::class);
    }
}
