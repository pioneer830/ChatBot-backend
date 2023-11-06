<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Tone;
use App\Models\Intention;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserToneIntentionUpdate extends Command
{
    const MAX_NUM = 10;
    const PATH = "\App\\Models\\";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tone:intention {type}';

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
        $type = $this->argument('type');
        if(!in_array($type, ['tone', 'intention'])){
            echo "Sorry wrong type entered. It should be either tone or intention";
            exit;
        }
        $table = "user". ucfirst($type);
        $relation = "user_".$type;
        $max = self::MAX_NUM;

        $data = [];
        $users = User::with($table)->get()->toArray();
        foreach($users as $user){
            $userId = $user['id'];
            $typeCount = count($user[$relation]);
            if($typeCount >= $max){
                continue;
            }

            $newClass = new (self::PATH.ucfirst($type));
            $selected = $newClass::select('id')->orderBy('id', 'ASC')
                ->whereNotIn('id', array_column($user[$relation], $type.'_id'))
                ->take(10)->get()->toArray();

            foreach ($selected as $key => $value){
                $data[$key]['user_id'] = $userId;
                $data[$key][$type.'_id'] = $value['id'];
                $data[$key]['created_at'] = Carbon::now();
                $data[$key]['updated_at'] = Carbon::now();
            }

            $table2 = new (self::PATH.$table);
            $table2::insert($data);
        }

        echo "==================== done processing =============";
    }
}
