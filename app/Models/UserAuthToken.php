<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuthToken extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','token','token_expiry'];

    public function add($inputData){
        return $this->create($inputData);
    }

    public function deleteByUserId($user_id){
        return $this->where('user_id',$user_id)->delete();
    }

    public function updateByUserId($user_id,$updateData){
        return $this->where('user_id',$user_id)->update($updateData);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }



    public function getUserWithAuthTokenByToken($token){
        return $this->with(['user','user.latestSubscription'])
            ->where('token',$token)
            ->whereDate('token_expiry','>=',Carbon::now())
            ->first();
    }
}
