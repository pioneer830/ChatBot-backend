<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Intention extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function userTone(): HasMany
    {
        return $this->hasMany(UserTone::class, 'intention_id', 'id');
    }

    public function tone_characters(): BelongsToMany
    {
        return $this->belongsToMany(CharacterLength::class, 'user_tones', 'intention_id', 'character_length_id');
    }

    public function getAllIntentions($limit = null): mixed
    {
        return self::select('id', 'name')->orderBy('id', 'ASC')->limit($limit)->get();
    }


}
