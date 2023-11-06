<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')->truncate();
        DB::table('plans')->insert([
            [
                "id" => 1,
                "name" => "Free",
                "plan_option" => "Upto 1,000 words a month",
                "amount" => 0,
                "plan_description" => "<p><br></p><ul><li>1 Selectable Tone</li><li>Response Tab Features</li></ul>",
                "plan_interval" => "month",
                "plan_intervalCount" => "30",
                "trial_period_days" => '0',
                "limit_words" => 1000,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ],
            [
                "id" => 4,
                "name" => "Free",
                "plan_option" => "Upto 1,000 words a month",
                "amount" => 0,
                "plan_description" => "<p><br></p><ul><li>1 Selectable Tone</li><li>Response Tab Features</li></ul>",
                "plan_interval" => "year",
                "plan_intervalCount" => "30",
                "trial_period_days" => '0',
                "limit_words" => 1000,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ],
            [
                "id" => 2,
                "name" => "Starter",
                "plan_option" => "Upto 100,000 words a month",
                "amount" => 15,
                "plan_description" => "<p><strong>Everything in Free, plus:</strong></p><p><br></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>",
                "plan_interval" => "month",
                "plan_intervalCount" => "30",
                "trial_period_days" => '7',
                "limit_words" => 1000000,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ],
            [
                "id" => 5,
                "name" => "Starter",
                "plan_option" => "Upto 100,000 words a month",
                "amount" => 170,
                "plan_description" => "<p><strong>Everything in Free, plus:</strong></p><p><br></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>",
                "plan_interval" => "year",
                "plan_intervalCount" => "30",
                "trial_period_days" => '7',
                "limit_words" => 1000000,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ],
            [
                "id" => 3,
                "name" => "Pro",
                "plan_option" => "For unlimited words a month",
                "amount" => 20,
                "plan_description" => "<p><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>",
                "plan_interval" => "month",
                "plan_intervalCount" => "30",
                "trial_period_days" => '7',
                "limit_words" => -1,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ],
            [
                "id" => 6,
                "name" => "Pro",
                "plan_option" => "For unlimited words a month",
                "amount" => 230,
                "plan_description" => "<p><strong>Everything in Starter, plus:</strong></p><p><br></p><ul><li>3 Selectable Tone</li><li>Response Tab Features</li><li>Customize Profile</li><li>Access to Script Tab</li></ul>",
                "plan_interval" => "year",
                "plan_intervalCount" => "30",
                "trial_period_days" => '7',
                "limit_words" => -1,
                "limit_duration" => 30,
                "created_at" => Carbon::now(),
                "updated_at" =>  Carbon::now()
            ]
        ]);
    }
}
