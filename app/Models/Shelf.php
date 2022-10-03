<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Shelf
 * @package App\Models
 */
class Shelf extends Model
{
    protected $table = 'shelves';
    protected $primaryKey = 'shelf_id';

    /**
     * Relationship to the Book model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function books()
    {
       return $this->hasMany(Book::class, 'shelf_id', 'shelf_id');
    }
}