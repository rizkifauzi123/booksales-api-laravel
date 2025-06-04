<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'cover_photo',
        'genre_id',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Accessor untuk URL gambar
    public function getCoverPhotoUrlAttribute()
    {
        return $this->cover_photo
            ? Storage::url('books/' . $this->cover_photo)
            : null;
    }
}
