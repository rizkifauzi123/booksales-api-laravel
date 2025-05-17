<?php

namespace App\models;


class Author {
   public static function all() {
    return [
        ['id' => 1, 'name' => 'J.k. Rowling'],
        ['id' => 2, 'name' => 'George Orwell'],
        ['id' => 3, 'name' => 'Agatha Cristie'],
        ['id' => 4, 'name' => 'Stephen King'],
        ['id' => 5, 'name' => 'Jane Austen'],
    ];
   }  
}