<?php

namespace App\Library;

use App\Models\Job;

class Jobs {
    protected static $jobs = [];

    
    public static function allJobs()
    {
        return static::$jobs;
    }

}

