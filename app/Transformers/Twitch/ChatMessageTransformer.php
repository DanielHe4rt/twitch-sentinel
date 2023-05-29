<?php

namespace App\Transformers\Twitch;

class ChatMessageTransformer
{
    public function transform(string $rawMessage): string
    {
        $e = explode(":", $rawMessage);
        array_shift($e);
        array_shift($e);
        return implode(':', $e);
    }
}
