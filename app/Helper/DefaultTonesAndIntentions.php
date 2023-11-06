<?php

namespace App\Helper;

use Carbon\Carbon;

class DefaultTonesAndIntentions
{
    const PATH = "\App\\Models\\";

    /**
     * @param $userId
     * @param $type
     * @return void
     */
    public static function defaultInsert($userId, $type): void
    {
        $table = "User". ucfirst($type);
        $data = [];
        $newClass = new (self::PATH.ucfirst($type));
        $defaultSelected = $newClass::select('id')->orderBy('id', 'ASC')->take(10)->get()->toArray();
        foreach ($defaultSelected as $key => $newValue){
            $data[$key]['user_id'] = $userId;
            $data[$key][$type.'_id'] = $newValue['id'];
            $data[$key]['created_at'] = Carbon::now();
            $data[$key]['updated_at'] = Carbon::now();
        }
        $table2 = new (self::PATH.$table);
        $table2::insert($data);
    }

}
