<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * A homepage test.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
