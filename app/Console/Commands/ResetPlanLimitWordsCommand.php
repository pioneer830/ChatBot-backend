<?php

namespace App\Console\Commands;

use App\Models\Guest;
use Illuminate\Console\Command;

class ResetPlanLimitWordsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-plan-limit-words-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $guests = Guest::all();
        foreach ($guests as $guest) {
            if(!is_object($guest->user)) {
                $guest->remain_count = 1000;
            } elseif(is_object($guest->user->lastSubscription())) {
                $guest->remain_count = $guest->user->lastSubscription()->plan->limit_words;
            }
            $guest->save();
        }
    }
}
