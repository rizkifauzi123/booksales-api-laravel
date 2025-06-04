<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        Genre::create([
            'name' => 'Fiksi',
        ]);

        Genre::create([
            'name' => 'Non-Fiksi',
        ]);

        Genre::create([
            'name' => 'Komik',
        ]);

        Genre::create([
            'name' => 'Fantasi',
        ]);

        Genre::create([
            'name' => 'Dystopia',
        ]);
    }
}