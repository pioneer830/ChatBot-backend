<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTone extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function tone(): BelongsTo
    {
        return $this->belongsTo(Tone::class, 'tone_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTonesByUserId($user_id){
        return self::with([
            'tone' => function($query){
                return $query->select('id', 'name');
            },
        ])->where('user_id', $user_id)->get();
    }
}
