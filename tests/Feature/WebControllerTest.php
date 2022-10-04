<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebControllerTest extends TestCase
{
    public function test_index_page_rendered_properly()
    {
        $response = $this->get('/');
        $response->assertSee('Welcome!', true);
    }

    public function test_404_page_not_found_rendered_properly()
    {
        $response = $this->get('/blabla');
        $response->assertSee('Page Not Found', true);
    }
}