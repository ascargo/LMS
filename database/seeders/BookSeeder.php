<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\BookStatus;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $availableId = BookStatus::firstOrCreate(['name' => 'Available'])->id;

        $books = [
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt, David Thomas',
                'isbn' => '9780201616224',
                'year' => 1999,
                'genre' => 'Technology',
            ],
            [
                'title' => 'A Wizard of Earthsea',
                'author' => 'Ursula K. Le Guin',
                'isbn' => '9780547773742',
                'year' => 1968,
                'genre' => 'Fantasy',
            ],
            [
                'title' => 'The Body Keeps the Score',
                'author' => 'Bessel van der Kolk',
                'isbn' => '9780143127741',
                'year' => 2014,
                'genre' => 'Health & Wellbeing',
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['isbn' => $book['isbn']],
                $book + ['status_id' => $availableId]
            );
        }
    }
}
