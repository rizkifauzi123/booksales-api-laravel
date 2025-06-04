<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'Pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => 'Sebuah seni untuk bersikap Bodo Amat',
            'description' => 'Membahas tentang kehidupan dan filosofi hidup seseorang',
            'price' => 25000,
            'stock' => 5,
            'cover_photo' => 'sebuah_seni.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'Naruto',
            'description' => 'Komik naruto',
            'price' => 55000,
            'stock' => 10,
            'cover_photo' => 'naruto.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Petualangan Bilbo Baggins di dunia fantasi Middle-earth.',
            'price' => 45000,
            'stock' => 8,
            'cover_photo' => 'the_hobbit.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'Novel dystopia klasik karya George Orwell.',
            'price' => 50000,
            'stock' => 12,
            'cover_photo' => '1984.jpg',
            'genre_id' => 1,
            'author_id' => 5,
        ]);
    }
}