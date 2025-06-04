<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create(['name' => 'Tere Liye']);         // id 1
        Author::create(['name' => 'Mark Manson']);       // id 2
        Author::create(['name' => 'Masashi Kishimoto']); // id 3
        Author::create(['name' => 'J.R.R. Tolkien']);    // id 4
        Author::create(['name' => 'George Orwell']);     // id 5
    }
}