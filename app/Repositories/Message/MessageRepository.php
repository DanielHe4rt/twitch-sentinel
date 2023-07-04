<?php

namespace App\Repositories\Message;



use App\Console\Commands\MessageDTO;

interface MessageRepository
{
    public function newMessage(MessageDTO $dto): void;

}
