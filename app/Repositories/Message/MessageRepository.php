<?php

namespace App\Repositories\Message;

use App\Connectors\DTO\MessageDTO;

interface MessageRepository
{
    public function newMessage(MessageDTO $dto): void;

}
