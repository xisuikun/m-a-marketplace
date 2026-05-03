<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    protected $fillable = [
        'documentable_id',
        'documentable_type',
        'title',
        'file_path',
        'file_type',
        'file_size',
        'is_private',
    ];

    // Polymorphic relationship to Company or Deal
    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
