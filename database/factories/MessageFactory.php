<?php

namespace Database\Factories;

use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{

    public function definition()
    {
        return [
            'streamer_id' => (string) fake()->numberBetween(111111, 999999),
            'chatter_id' => (string) fake()->numberBetween(111111, 999999),
            'chatter_username' => fake()->userName(),
            'chatter_badges' => 'lalal',
            'chatter_message' => fake()->sentence(),
            'sent_at' => new Timestamp(Carbon::now()->getTimestamp() * 1000, 0),
            'created_at' => new Timestamp(Carbon::now()->getTimestamp() * 1000, 0)
        ];
    }
}
