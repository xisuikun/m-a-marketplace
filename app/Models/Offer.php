<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    protected $fillable = [
        'deal_id',
        'user_id',
        'amount',
        'terms',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    // The deal this offer is for
    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class);
    }

    // The buyer who made this offer
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
