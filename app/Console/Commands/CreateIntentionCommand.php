<?php

namespace App\Console\Commands;

use App\Models\Intention;
use Illuminate\Console\Command;

class CreateIntentionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:intention{intention*}';

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
        $intentions = explode(',', implode(' ', $this->argument('intention')));
        $data =[];

        if(empty($intentions)){
            echo "Sorry pass the list of intention separated by comma";
            exit;
        }
        echo "\n~~~~~~~~~~~~~~~~~~ Inserting intentions ~~~~~~~~~~~~~~~~~~\n";
        foreach($intentions as $intention)
        {
            //check if the intention already exist
            if(self::checkIntention(ucwords($intention)) || empty($intention)){
                continue;
            }
            $data[]['name'] = ucwords($intention);
        }

        Intention::insert($data);
        echo "\n~~~~~~~~~~~~~~~~~~ Done inserting intentions ~~~~~~~~~~~~~~~~~~\n";
    }

    /**
     * @param $intention
     * @return bool
     */
    private static function checkIntention($intention): bool
    {
        return (bool) Intention::where('name', ucwords($intention))->count();
    }
}
