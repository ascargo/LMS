<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookStatus;

class BookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Available', 'Borrowed', 'Reserved', 'Lost'] as $name) {
            BookStatus::firstOrCreate(['name' => $name]);
        }
    }
}
