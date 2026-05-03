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
        'net_profit',
        'growth_percentage',
        'valuation',
        'location',
        'deal_type',
        'status',
        'is_confidential',
    ];

    // The company being sold in this deal
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // NDAs for this deal
    public function ndas(): HasMany
    {
        return $this->hasMany(Nda::class);
    }

    // Check if a user has signed NDA for this deal
    public function hasNdaSignedByUser($userId): bool
    {
        return $this->ndas()->where('user_id', $userId)->where('status', 'signed')->exists();
    }

    // Offers received for this deal
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    // Messages for negotiation
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    // Documents specific to this deal (Teaser PDF, CIM, etc)
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
