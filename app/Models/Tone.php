<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tone extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function userTone(): HasMany
    {
        return $this->hasMany(UserTone::class, 'tone_id', 'id');
    }

    public function tone_character(): BelongsToMany
    {
        return $this->belongsToMany(CharacterLength::class, 'user_tones', 'tone_id', 'character_length_id');
    }

    public function getAllTones($limit = null){
      return Tone::select('id', 'name')->orderBy('id', 'ASC')->limit($limit)->get();
    }


}
