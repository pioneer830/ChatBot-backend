<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterLength extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function userTone(): HasMany
    {
        return $this->hasMany(UserTone::class, 'character_length_id', 'id');
    }
}
