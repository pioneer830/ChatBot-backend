<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }

}
