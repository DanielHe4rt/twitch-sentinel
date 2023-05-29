<?php

namespace App\Console\Commands;

use App\Connectors\TwitchConnector;
use App\Transformers\Twitch\ChatMessageTransformer;
use App\Transformers\Twitch\RawCommandTransformer;
use App\Transformers\Twitch\TwitchCommandTransform;
use Illuminate\Console\Command;
use Illuminate\Contracts\Pipeline\Pipeline;

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
        TwitchConnector $client,
        RawCommandTransformer $rawTransformer,
        ChatMessageTransformer $chatMessageTransformer,
        TwitchCommandTransform $twitchCommandTransformer,
    )
    {
        $client->connect();
        sleep(2);
        while (true) {
            $rawMessage = $client->read(512);
            dump($chatMessageTransformer->transform($rawMessage));
            dump($twitchCommandTransformer->transform($rawMessage));
            dump($rawTransformer->transform($rawMessage));
        }
    }
}
