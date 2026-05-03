<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nda extends Model
{
    protected $fillable = ['deal_id', 'user_id', 'status', 'signed_at', 'file_path', 'ip_address'];

    protected $casts = [
        'signed_at' => 'datetime',
    ];

    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
