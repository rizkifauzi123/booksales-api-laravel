<?php
namespace App\Models;



class Genre {
    public static function all() {
        return [
        ['id' => 1, 'name' => 'Fiksi'],
        ['id' => 2, 'name' => 'Non-Fiksi'],
        ['id' => 3, 'name' => 'Misteri'],
        ['id' => 4, 'name' => 'Fantasi'],
        ['id' => 5, 'name' => 'Biografi']

        ];
    }
}


