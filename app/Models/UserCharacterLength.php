<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCharacterLength extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function characterLength(): BelongsTo
    {
        return $this->belongsTo(CharacterLength::class, 'character_length_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
