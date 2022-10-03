<?php

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Book::class, 2)->create();

        $faker = Faker\Factory::create();
        $faker->addProvider( new Faker\Provider\Barcode($faker) );
        $faker->addProvider( new Faker\Provider\Company($faker) );
        $faker->addProvider( new Faker\Provider\Address($faker) );

        for($i=0;$i<9;$i++) {
            DB::table('books')->insert([
                'name' => $faker->company.' '.$faker->city,
                'shelf_id' => 1,
                'isbn' => $faker->isbn10,
                'published_at' => $faker->date(),
                'created_at'=> \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=> \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
