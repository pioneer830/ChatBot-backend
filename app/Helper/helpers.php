<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function userPlanId(): int
{
    $auth_user_plan_id = getPlanIdSession();
    if(!($auth_user_plan_id > 0)){
        $user = Auth::user();
        $auth_user_plan_id = $user?->lastPlan()?->plan_id ?? 0;
        setPlanIdSession($auth_user_plan_id);
    }

    return $auth_user_plan_id;
}


function getSession($key){
    return session()->get($key);
}

function removeSession($key){
    return session()->forget($key);
}

function setSession($key, $value){
    session()->put($key,$value);
}
function setPlanIdSession($plan_id){
    setSession('auth_user_plan_id',$plan_id);
}

function getPlanIdSession(){
 return getSession('auth_user_plan_id');
}

function removePlanIdSession(){
    return removeSession('auth_user_plan_id');
}

function isPro(): bool
{
    if (userPlanId() == 3 || userPlanId() == 6) {
        return true;
    }
    return false;
}





function getPermissionMessage($label){


    $message['customize'] = 'You do not have permission for Customize';
    $message['user_tones'] = 'You do not have permission for User Tones';
    $message['user_intentions'] = 'You do not have permission for User Intentions';
    $message['job_description'] = 'You do not have permission for Job Description';
    $message['job_title'] = 'You do not have permission for Job Title';

    $replaced_label = str_replace(" ","_",strtolower($label));

    return $message[$replaced_label] ?? "You do not have permission";
}


function getSessionLifeTime(){
    return Carbon::now()->addMinutes(config('session.lifetime'));
}

function addDayWithCurrentTime($days){
    return Carbon::now()->addDays($days);
}


function getCurrentPlanName(){
    $plan = 'GUEST';
    $plan_id = userPlanId();

    if($plan_id == 3 || $plan_id == 6){
        $plan = 'PRO';
    }else if($plan_id == 2 || $plan_id == 5){
        $plan = 'STARTER';
    }else if($plan_id == 1 || $plan_id == 4){
        $plan = 'FREE';
    }

    return $plan;
}

function isAllowPermission($permission_key){
    $permission_key = strtolower($permission_key);
    $result = false;
    $plan = getCurrentPlanName();

    $plans['PRO'] = [
        'customize',
        'customize_tones',
        'customize_intentions',
        'job_title',
        'job_description'
    ];
    $plans['STARTER'] = [
        'job_title',
        'job_description'
    ];

    $plans['FREE'] = [];

    if(in_array($permission_key,$plans[$plan])){
        $result = true;
    }

    return $result;
}
