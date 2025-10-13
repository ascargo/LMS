<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title','author','isbn','year','genre','collection','location','cover_path','status_id'
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(BookStatus::class, 'status_id');
    }

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }
}
