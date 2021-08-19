<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $faker;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    /**
     * Reset the migrations
     */
    public function tearDown(): void
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
