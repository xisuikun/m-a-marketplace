<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'industry',
        'description',
        'website',
        'registration_number',
    ];

    // The seller who owns this company
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Deals associated with this company
    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }

    // Ownership Structure
    public function shareholders(): HasMany
    {
        return $this->hasMany(Shareholder::class);
    }

    // Documents (Due Diligence files etc)
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
