<?php

namespace App\Console\Commands;
class MessageDTO
{
    public function __construct(
        public readonly string $message,
        public readonly array  $messagePayload
    )
    {

    }

    public static function makeFromTwitch(
        string $message,
        array  $messagePayload
    ): self
    {
        return new self(message: $message, messagePayload: $messagePayload);
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
