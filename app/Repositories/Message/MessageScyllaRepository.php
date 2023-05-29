<?php

namespace App\Repositories\Message;

use App\Connectors\DTO\MessageDTO;
use App\Models\Message;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Support\Facades\DB;

class MessageScyllaRepository implements MessageRepository
{

    public function newMessage(MessageDTO $dto): void
    {
        $payload = $dto->toDatabase();
        $payload['created_at'] = Timestamp::fromDateTime(Carbon::now()->toDateTime());
        $payload['sent_at'] = Timestamp::fromDateTime(Carbon::now()->toDateTime());


        DB::table('messages')->insert($payload);
        DB::table('messages_count')
            ->where('streamer_id', $dto->messagePayload['room-id'])
            ->increment('messages_count');
    }
}
