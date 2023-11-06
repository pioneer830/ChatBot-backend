<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
      'name', 'plan_id', 'user_id', 'trial_ends_at', 'ends_at', 'stripe_status', 'stripe_price', 'stripe_id'
    ];

    public function plan() {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
