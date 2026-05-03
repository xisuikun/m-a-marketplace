<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Deal extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'teaser',
        'asking_price',
        'revenue_annual',
        'ebitda',
        'status',
        'is_confidential',
    ];

    // The company being sold in this deal
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // Offers received for this deal
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    // Documents specific to this deal (Teaser PDF, CIM, etc)
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
