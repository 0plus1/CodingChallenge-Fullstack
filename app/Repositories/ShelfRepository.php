<?php

namespace App\Repositories;

use App\Interfaces\ShelfRepositoryInterface;
use App\Models\Shelf;
use App\Models\Book;

class ShelfRepository implements ShelfRepositoryInterface
{

	public function getAllSlugs()
	{
		return Shelf::all()->pluck('slug','name');
	}


	public function getNameBySlug($shelfSlug)
	{
		$shelf = Shelf::where('slug', $shelfSlug)->first();
		return $shelf ? $shelf->name : null;
	}

	
	public function getBooksBySlug($shelfSlug)
	{
		$books = Book::whereHas('shelf', function($q) use($shelfSlug) {
			$q->where('slug', $shelfSlug);
		})->get();

		return $books;
	}
}