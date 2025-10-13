<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patron extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'approved',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
