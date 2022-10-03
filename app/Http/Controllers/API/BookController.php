<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function response;

class BookController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function metadata()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider( new \Faker\Provider\Person($faker) );
        $faker->addProvider( new \Faker\Provider\DateTime($faker) );
        $faker->addProvider( new \Faker\Provider\Image($faker) );

        $jsonable = [];

        foreach(Book::all()->pluck('book_id') as $book_id) {
            $jsonable[$book_id] = [
                'published_at' => $faker->date(),
                'author' => $faker->title.' '.$faker->name,
                'cover' => $faker->imageUrl,

            ];
         }

        return response()->json($jsonable);
    }
}
