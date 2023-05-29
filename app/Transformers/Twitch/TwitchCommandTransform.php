<?php

namespace App\Transformers\Twitch;

class TwitchCommandTransform
{
    public function transform(string $payload): string
    {
        $ex = explode('.tmi.twitch.tv', $payload);
        if (count($ex) == 1) {
            return false;
        }
        $ex1 = explode(' ', substr($ex[1], 1));

        return $ex1[0];
    }
}
