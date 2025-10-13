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
        $statuses = ['Available', 'Borrowed', 'Reserved', 'Lost'];

        foreach ($statuses as $status) {
            BookStatus::firstOrCreate(['name' => $status]);
        }
    }
}
