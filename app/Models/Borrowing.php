<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'patron_id',
        'borrowed_at',
        'returned_at',
    ];

    protected $casts = [
        'borrowed_at' => 'date',
        'returned_at' => 'date',
    ];

    // Relationships
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class)->withDefault();
    }

    public function patron(): BelongsTo
    {
        return $this->belongsTo(Patron::class)->withDefault();
    }
}
