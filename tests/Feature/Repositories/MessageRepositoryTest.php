<?php

namespace Repositories;

use App\Connectors\DTO\MessageDTO;
use App\Repositories\Message\MessageRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MessageRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_do_shit()
    {
        $payload = [
            "@badge-info" => "subscriber/58",
            "badges" => [
                "broadcaster/1",
                "subscriber/3036",
                "partner/1"
            ],
            "client-nonce" => "619a215dbf3e91c31c688dc3a8300255",
            "color" => "#8A2BE2",
            "display-name" => "danielhe4rt",
            "emotes" => "",
            "first-msg" => "0",
            "flags" => "",
            "id" => "24a940bb5589-4089-965f-7297957c067d",
            "mod" => "0",
            "returning-chatter" => "0",
            "room-id" => "227168488",
            "subscriber" => "1",
            "tmi-sent-ts" => "1685387548320",
            "turbo" => "0",
            "user-id" => "227168487",
            "user-type" => ""
        ];

        app(MessageRepository::class)->newMessage(MessageDTO::makeFromTwitch('fodase', 'PRIVMSG', $payload));


    }
}
