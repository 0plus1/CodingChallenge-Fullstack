<?php

namespace App\Http\Controllers\API;

use Log;
use Validator;
use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShelfController extends Controller
{
    /**
     * GET /shelf/{shelf_slug}/read
     *
     * @return JSON
     */
    public function index(Request $request, $shelf_slug) 
    {
        $all = $request->all();

        Log::debug('GET /shelf/{shelf_slug}/read');
        Log::debug($all);

        $validator = Validator::make(['shelf_slug' => $shelf_slug], [
            'shelf_slug' => 'required|string|max:255',
        ]);

        if ( $validator->fails() ) {
          abort(400, $validator->messages());
        }

        $books = Shelf::leftJoin('books', 'shelves.shelf_id', '=', 'books.shelf_id')
                  ->select('shelves.shelf_id', 'books.book_id', 'books.name', 'books.isbn', 'books.created_at', 'books.updated_at')
                  ->where('shelves.slug', $shelf_slug)
                  ->orderBy('created_at', 'desc')
                  ->get();

        return [
            'books' => $books
        ];
    }
}
