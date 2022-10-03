<?php

namespace Tests\Feature;

use App\Models\Shelf;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShelvesTest extends TestCase
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
        $response = $this->get(route('api.shelf.books.read'), ['shelf_slug' => $this->faker->slug]);

        $response
            ->assertStatus(200);
    }

    /**
     * Test fetch books from shelf api with vaild shelf slug
     *
     * @return void
     */
    public function testReadAllBooksForInvaildShelfSlug()
    {
        $response = $this->get(route('api.shelf.books.read'), ['shelf_slug' => $this->faker->slug]);

        $response
            ->assertStatus(404);
    }


}
