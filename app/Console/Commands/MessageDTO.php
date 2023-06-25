<?php

namespace App\Console\Commands;
class MessageDTO
{
    public string $message;
    public array $messagePayload;

    public function makeFromTwitch(
        string $message,
        array  $messagePayload
    ): void
    {
        $this->message = $message;
        $this->messagePayload = $messagePayload;
    }

    public function toDatabase(): array
    {
        return [
            'streamer_id' => (string)$this->messagePayload['room-id'],
            'chatter_id' => (string)$this->messagePayload['user-id'],
            'chatter_username' => (string)$this->messagePayload['display-name'],
            'chatter_badges' => (string)'abc',
            'chatter_message' => (string)$this->message,
            'sent_at' => $this->messagePayload['tmi-sent-ts'],
        ];
    }
}
