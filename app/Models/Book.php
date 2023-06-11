<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'id_author',
        'description',
        'pages',
        'genre',
        'price',
    ];

    /**
     * Get the user associated with the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function relAuthors()
    {
        return $this->hasOne(Author::class, 'id', 'id_author');
    }
}
