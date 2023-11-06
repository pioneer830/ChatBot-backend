<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_ip", "user_id", "client_id", "remain_count"
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
