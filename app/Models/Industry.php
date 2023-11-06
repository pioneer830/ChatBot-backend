<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function about(): HasMany
    {
        return $this->hasMany(About::class, 'industry_id', 'id');
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'industry', 'id');
    }
}
