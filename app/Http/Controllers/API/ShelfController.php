<?php

namespace App\Http\Controllers\API;
use App\Repositories\ShelfRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShelfController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $repository;

    public function __construct(ShelfRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getBooks($shelf_slug){
        $shelf = $this->repository->findShelfViaSlug($shelf_slug);

        if(empty($shelf)){
            return response()->json(['message'=>'slug invaild'], 404);
        }

        /* @var \Illuminate\Support\Collection */
        $books = $this->repository->grabBooksFromShelf($shelf);

        $data = $books->transform(function ($book){
            return [
                'name' => $book->name,
                'isbn' => $book->isbn,
                'id' => $book->book_id,
            ];
        })->all();

        return response()->json($data);
    }
}