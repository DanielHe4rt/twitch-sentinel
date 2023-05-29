<?php

namespace Database\Factories;

use App\Models\Streamer;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Cassandra\Tinyint;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreamerFactory extends Factory
{
    protected $model = Streamer::class;

    public function definition(): array
    {
        return [
            'streamer_id' => (string)fake()->numberBetween(111111,999999),
            'streamer_username' => fake()->userName(),
            // 'is_online' => new Tinyint(1), -> resolve how to input tinyint into database
            'created_at' => new Timestamp(Carbon::now()->getTimestamp() * 1000, 0)
        ];
    }
}
