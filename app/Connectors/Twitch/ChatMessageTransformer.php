<?php

namespace App\Connectors\Twitch;

class ChatMessageTransformer
{
    public function transform(string $rawMessage): string
    {
        $beforeMessage = explode("PRIVMSG", $rawMessage);
        $e = explode(':', $beforeMessage[1]);
        return trim(implode(':', $e));
    }
}
