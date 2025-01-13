<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $fillable = [
    'name', 'photo', 'bio'
  ];

//   protected function photo(): Attribute
//     {
//         return Attribute::make(
//             get: fn ($image) => url('/storage/authors/' . $image),
//         );
// }
}
