<?php

namespace App\Console\Commands;

use App\Connectors\DTO\MessageDTO;
use App\Connectors\Twitch\ChatMessageTransformer;
use App\Connectors\Twitch\RawCommandTransformer;
use App\Connectors\Twitch\TwitchCommandTransform;
use App\Connectors\TwitchConnector;
use App\Repositories\Message\MessageRepository;
use App\Repositories\Streamer\StreamerRepository;
use Illuminate\Console\Command;

class TwitchBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:twitch-start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start to listen Twitch Server';

    /**
     * Execute the console command.
     */
    public function handle(
        TwitchConnector        $client,
        RawCommandTransformer  $rawTransformer,
        ChatMessageTransformer $chatMessageTransformer,
        TwitchCommandTransform $twitchCommandTransformer,
        StreamerRepository     $streamerRepository,
        MessageRepository      $messageRepository
    )
    {
        $streamerList = $streamerRepository
            ->getStreamers()
            ->pluck('streamer_username')
            ->toArray();

        $client->connect($streamerList);


        ob_start();
        while (true) {
            while ($rawMessage = $client->read()) {
                $signal = $twitchCommandTransformer->transform($rawMessage);

                if ($signal !== "PRIVMSG") {
                    continue;
                }

                $messageDTO = MessageDTO::makeFromTwitch(
                    $chatMessageTransformer->transform($rawMessage),
                    $signal,
                    $rawTransformer->transform($rawMessage)
                );

                $messageRepository->newMessage($messageDTO);
                $this->info(sprintf(
                    '[%s] (%s) %s: %s ',
                    date('Y-m-d H:i:s'),
                    $messageDTO->messagePayload['room-id'],
                    $messageDTO->messagePayload['display-name'],
                    $messageDTO->message
                ));
                flush();
            }
        }
    }
}
