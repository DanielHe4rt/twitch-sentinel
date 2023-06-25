<?php

namespace App\Console\Commands;

use App\Repositories\Message\MessageRepository;
use App\Repositories\Streamer\StreamerRepository;
use GhostZero\Tmi\Client;
use GhostZero\Tmi\ClientOptions;
use GhostZero\Tmi\Events\Twitch\MessageEvent;
use GhostZero\TmiCluster\Models\Channel;
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
        StreamerRepository $streamerRepository,
        MessageRepository  $messageRepository
    )
    {
//        $channelManager = app(ChannelManager::class);
//        $twitchClient = app(TwitchClient::class);
//
//        foreach (config('sentinel.categories') as $category) {
//            collect($twitchClient->getStreamsByCategory($category)->json()['data'])
//                ->each(function ($stream) use ($channelManager, $twitchClient) {
//                    $channelManager->authorize(new TwitchLogin($stream['user_login']), ['reconnect' => true]);
//                    $this->info(sprintf('Connected to %s on %s category', $stream['user_login'], $stream['game_name']));
//                });
//        }

        $client = new Client(new ClientOptions([
            'connection' => [
                'secure' => true,
                'reconnect' => true,
                'rejoin' => true,
            ],
            'channels' => Channel::query()
                ->pluck('id')
                ->map(fn($channel) => str_replace('#', '', $channel))
                ->toArray()
        ]));
        try {
            $client->on(MessageEvent::class, function (MessageEvent $e) use ($messageRepository) {
                $messageDTO = MessageDTO::makeFromTwitch(
                    utf8_encode($e->message),
                    $e->tags->getTags()
                );

                $messageRepository->newMessage($messageDTO);
                $this->info(sprintf(
                    '[%s] (%s) %s: %s ',
                    date('Y-m-d H:i:s'),
                    $messageDTO->messagePayload['room-id'],
                    $messageDTO->messagePayload['display-name'],
                    $messageDTO->message
                ));
            });

            $client->connect();
        } catch (ErrorException) {

        }


    }

}
