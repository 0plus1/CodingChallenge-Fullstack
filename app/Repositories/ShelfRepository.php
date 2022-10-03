<?php

namespace App\Repositories;

use App\Models\Shelf;
use Illuminate\Support\Collection;


class ShelfRepository
{
    private $shelf;
    public function __construct(Shelf $shelf){
        $this->shelf = $shelf;
    }


    /**
     * find shelf via shelf slug
     * @param $slug
     * @return Shelf|null
     */
    public function findShelfViaSlug($slug): ?Shelf
    {
        return $this->shelf->where('slug', $slug)->first();
    }

    public function grabBooksFromShelf(Shelf $shelf): ?Collection
    {
        return $shelf->books;
    }

    public function getAllShelvies(){
        return $this->shelf->all();
    }
}