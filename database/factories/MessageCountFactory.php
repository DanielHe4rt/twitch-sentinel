<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageCountFactory extends Factory
{

    public function definition()
    {
        return [
            'streamer_id' => (string) fake()->numberBetween(111111,999999),
            'messages_count' => 0
        ];
    }
}
