<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookStatus;
use App\Enums\BookStatusEnum;

class BookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (BookStatusEnum::cases() as $status) {
            BookStatus::firstOrCreate(['name' => $status->value]);
        }
    }
}
