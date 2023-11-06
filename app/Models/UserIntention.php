<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserIntention extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function intention(): BelongsTo
    {
        return $this->belongsTo(Intention::class, 'intention_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getUserIntentionByUserId($user_id){
        return self::with([
            'intention' => function($query){
                return $query->select('id', 'name');
            },
        ])->where('user_id', $user_id)->get();
    }


}
