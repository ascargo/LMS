<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patron extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'approved',
    ];

    protected $casts = [
        'approved' => 'boolean',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
