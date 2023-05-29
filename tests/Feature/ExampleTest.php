<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Streamer;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Cassandra\Uuid;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function test_factories_with_scylla(): void
    {

    }
}
