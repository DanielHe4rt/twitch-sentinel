<?php

namespace Database\Factories;

use App\Models\Streamer;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreamerFactory extends Factory
{
    protected $model = Streamer::class;

    public function definition(): array
    {
        return [
            'provider_id' => fake()->word(),
            'provider_name' => fake()->name(),
            'created_at' => Timestamp::fromDateTime(Carbon::now()->toDateTime())
        ];
    }
}
