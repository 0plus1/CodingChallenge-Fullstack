<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Interfaces\ShelfRepositoryInterface;

class ShelfController extends BaseController
{
    protected $shelfRepository;

    
    public function __construct(ShelfRepositoryInterface $shelfRepository)
    {
        $this->shelfRepository = $shelfRepository;
    }


    public function search(Request $request)
    {
        $shelfSlug = $request->route('shelf_slug');

        $shelfName = $this->shelfRepository->getNameBySlug($shelfSlug);
        if (!$shelfName) {
            abort(404);
        }

        $books = $this->shelfRepository->getBooksBySlug($shelfSlug);
        $jsonable = [];
		foreach($books as $book) {
			$jsonable[$book->book_id] = [
				'name' => $book->name,
				'ISBN' => $book->isbn,
			];
		}

        return view('app.pages.read_shelf', [
            'shelfName' => $shelfName,
            'books' => $books
        ]);
    }
}