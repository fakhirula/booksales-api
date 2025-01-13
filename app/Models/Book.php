<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        "title", "description", "price", "stock", "cover_photo", "genre_id", "author_id"
    ];

    // Relasi dengan model Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Relasi dengan model Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
