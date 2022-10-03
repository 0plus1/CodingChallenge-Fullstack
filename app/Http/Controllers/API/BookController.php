<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use function response;

class BookController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMetadata()
    {
        $ids = [];
        if (Request::has('book_id')) {
            $ids[] = Request::get('book_id');
        }
        $books = $this->repository->findBooks($ids);
        $jsonable = [];

        foreach ($books as $book) {
            $jsonable[$book->book_id] = [
                'published_at' => $book->published_at,
                'author' => optional($book->authors)->implode(','),
                'cover' => optional($book->cover)->image_url,
            ];
        }

        return response()->json($jsonable);
    }
}
