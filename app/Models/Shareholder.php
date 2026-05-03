<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shareholder extends Model
{
    protected $fillable = ['company_id', 'name', 'type', 'ownership_percentage'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
