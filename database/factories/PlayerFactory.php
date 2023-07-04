<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{

    protected $model = Message::class;
    public function definition()
    {
        return [];
    }
}

