<?php

namespace App\Console\Commands;

use App\Models\Tone;
use Illuminate\Console\Command;

class CreateToneCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:tones {tones*}';

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
        $data = [];
        $tones = explode(',', implode(' ', $this->argument('tones')));

        if(empty($tones)){
            echo "Sorry pass the list of tones separated by comma";
           exit;
        }
        echo "\n~~~~~~~~~~~~~~~~~~ Inserting tones ~~~~~~~~~~~~~~~~~~\n";
        foreach($tones as $tone)
        {
            if(self::checkTone(ucwords($tone)) || empty($tone)){
                continue;
            }
            $data[]['name'] = $tone;
        }

        Tone::insert($data);
        echo "\n~~~~~~~~~~~~~~~~~~ Done inserting tones ~~~~~~~~~~~~~~~~~~\n";

    }

    /**
     * @param $tone
     * @return bool
     */
    private static function checkTone($tone): bool
    {
        return (bool) Tone::where('name', ucwords($tone))->count();
    }
}
