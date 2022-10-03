<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App\Models
 */
class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $dates = ['published_at'];

    /**
     * Shelf relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shelf()
    {
        return $this->belongsTo(Shelf::class,'shelf_id', 'shelf_id');
    }

    /**
     * Authors
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors(){
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    /**
     * Book cover image
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function cover(){
        return $this->morphOne(Image::class, 'imageable');
    }
}