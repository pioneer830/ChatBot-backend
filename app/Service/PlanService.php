<?php


namespace App\Service;


use App\Models\Plan;

class PlanService
{
    public static function searchIndex($search_params)
    {
        $plans = Plan::orderBy('id');

        if(isset($search_params['keyword']) && $search_params['keyword']) {
            $plans->where('name', 'like', '%'.$search_params['keyword'].'%');
        }

        return $plans;
    }

    public static function store($params)
    {
        $plan = Plan::create($params);
        return $plan != null;
    }

}

//creating about api

