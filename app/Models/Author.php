<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nacionality',
    ];

    /**
    * Get all of the books for the User.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function relBooks()
    {
        return $this->hasMany(Book::class, 'id_author', 'id');
    }
}
