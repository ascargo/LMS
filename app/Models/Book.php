<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title','author','isbn','year','genre','collection','location','cover','status_id'
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

    /* Scopes */
    public function scopeSearch($query, ?string $term)
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function ($sub) use ($term) {
            $sub->where('title', 'like', "%{$term}%")
                ->orWhere('author', 'like', "%{$term}%")
                ->orWhere('isbn', 'like', "%{$term}%");
        });
    }

    public function scopeStatusNotIn($query, array $names)
    {
        return $query->whereHas('status', fn ($q) => $q->whereNotIn('name', $names));
    }
}
