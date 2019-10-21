<?php

namespace App\Http\Controllers\API;

use Log;
use Validator;
use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\BookMetadataLogger;

class BookController extends Controller
{
    /**
     * GET /metadata/read/{book_id}
     *
     * @return JSON
     */
    public function show(Request $request, $book_id) 
    {
        $all = $request->all();

        Log::debug('GET /metadata/read/{book_id}');
        Log::debug($all);

        $validator = Validator::make(['book_id' => $book_id], [
            'book_id' => 'required|integer',
        ]);

        if ( $validator->fails() ) {
          abort(400, $validator->messages());
        }
        
        $book = Book::select('book_id', 'shelf_id', 'name', 'isbn', 'created_at')
                  ->where('book_id', $book_id)
                  ->first();

        if ($book) {
          BookMetadataLogger::log(
            $book->book_id, 
            $book->shelf_id, 
            $book->name, 
            $book->isbn, 
            $book->created_at
          );
          
          return $book;
        }

        return [];
    }

}
