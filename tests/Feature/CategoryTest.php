<?php

namespace Tests\Feature;

use App\Entities\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_categories_unauthorized()
    {
        $response = $this->getJson('/api/categories');

        $response->assertStatus(200);
    }

    public function test_categories_authorized()
    {
        $this->actingAs(User::find(1));

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200);
    }
}
