<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealsRouteTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function test_the_meals_route_returns_successful_response()
    {
        $response = $this->get('/api/meals?lang=hr');

        $response->assertStatus(200);
    }
}
