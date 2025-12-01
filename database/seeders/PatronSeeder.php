<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patron;

class PatronSeeder extends Seeder
{
    public function run(): void
    {
        $patrons = [
            [
                'name' => 'Jane Reader',
                'email' => 'jane.reader@example.com',
                'message' => 'Amiga y lectora habitual.',
                'approved' => true,
            ],
            [
                'name' => 'Carlos Bibliotecario',
                'email' => 'carlos.biblio@example.com',
                'message' => 'Colega de intercambio de libros.',
                'approved' => true,
            ],
            [
                'name' => 'Lucía Exploradora',
                'email' => 'lucia.explora@example.com',
                'message' => 'Pendiente de aprobación.',
                'approved' => false,
            ],
        ];

        foreach ($patrons as $patron) {
            Patron::firstOrCreate(['email' => $patron['email']], $patron);
        }
    }
}
