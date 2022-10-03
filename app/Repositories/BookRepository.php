<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    private $book;

    public function __construct(Book $book){
        $this->book = $book;
    }

    /**
     * fetch Books via given ids, if no id provided, return all books
     * @param array $ids
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findBooks(Array $ids){
        if (empty($ids)){
            return $this->book->all();
        }
        return $this->book->whereIn('book_id', $ids)->get();
    }
}