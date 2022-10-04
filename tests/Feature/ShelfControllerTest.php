<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Shelf;
use Faker\Generator as Faker;

class ShelfControllerTest extends TestCase
{
    use WithFaker;
    // use RefreshDatabase;

    public function test_existing_page_can_be_rendered()
    {
        $fakeColorName = $this->faker()->colorName;
        $fakeSlug = str_slug($fakeColorName);
        factory('App\Models\Shelf')->create([
                'name' => $fakeColorName,
                'slug' => $fakeSlug
            ]);
        $response = $this->get('/shelf/'.$fakeSlug.'/read');
        $response->assertStatus(200);
    }

    public function test_non_existing_page_returns_404_code()
    {
        $fakeColorName = $this->faker()->colorName;
        $fakeSlug = str_slug($fakeColorName);
        factory('App\Models\Shelf')->create([
                'name' => $fakeColorName,
                'slug' => $fakeSlug
            ]);
        $response = $this->get('/shelf/'.$fakeSlug.'-test/read');
        $response->assertStatus(404);
    }
}