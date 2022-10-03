<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Books
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books(){
        return $this->belongsToMany(Book::class, 'author_book');
    }
}
