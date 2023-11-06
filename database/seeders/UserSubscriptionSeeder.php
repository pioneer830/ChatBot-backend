<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = Plan::select('name', 'id')->get();
        $users = User::limit(10)->get();
        foreach ($users as $key => $user) {
            Subscription::create([
                'user_id' => $user->id ?? 0,
                'plan_id' => $plans[$key]->id ?? 1,
                'name' => $plans[$key]->name ?? 'Free',
                'stripe_id' => Str::random(10),
                'stripe_price' => 0,
                'stripe_status' => '',
            ]);
        }
    }
}
