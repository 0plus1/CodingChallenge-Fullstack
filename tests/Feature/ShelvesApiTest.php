<?php

namespace Tests\Feature;

use App\Models\Shelf;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShelvesApiTest extends TestCase
{
    use WithFaker;

    private $slug;

    public function setUp()
    {
        parent::setUp();
        $shelf = Shelf::firstOrFail();
        $this->slug = $shelf->slug;
    }

    /**
     * Test fetch books from shelf api with vaild shelf slug
     *
     * @return void
     */
    public function testReadAllBooksForVaildShelfSlug()
    {
        $response = $this->get(route('api.shelf.books.read', ['shelf_slug' => $this->slug]));

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'name',
                    'isbn',
                    'id'
                ]
            ]);
    }

    /**
     * Test fetch books from shelf api with vaild shelf slug
     *
     * @return void
     */
    public function testReadAllBooksForInvaildShelfSlug()
    {
        $response = $this->get(route('api.shelf.books.read', ['shelf_slug' => $this->faker->slug]));

        $response
            ->assertStatus(404);
    }

    public function testGetAllShelvies()
    {
        $response = $this->get(route('api.shelf.all'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'name',
                    'slug',
                    'id'
                ]
            ]);
    }


}
