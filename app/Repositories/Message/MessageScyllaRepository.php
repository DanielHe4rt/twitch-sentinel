<?php

namespace App\Repositories\Message;


use App\Console\Commands\MessageDTO;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Support\Facades\DB;

class MessageScyllaRepository implements MessageRepository
{

    public function newMessage(MessageDTO $dto): void
    {
        $payload = $dto->toDatabase();
        $payload['sent_at'] = Timestamp::fromDateTime(Carbon::now()->toDateTime());


        DB::connection('scylla')->table('messages')->insert($payload);
        DB::connection('scylla')->table('messages_count')
            ->where('streamer_id', $dto->messagePayload['room-id'])
            ->increment('messages_count');
    }
}
