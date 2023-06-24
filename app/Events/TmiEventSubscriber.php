<?php

namespace App\Events;

use App\Console\Commands\MessageDTO;
use App\Repositories\Message\MessageRepository;
use GhostZero\Tmi\Events\Twitch\CheerEvent;
use GhostZero\Tmi\Events\Twitch\MessageEvent;
use GhostZero\Tmi\Events\Twitch\SubEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class TmiEventSubscriber implements ShouldQueue
{
    public function __construct(private readonly MessageRepository $messageRepository)
    {
    }

    public function handleMessageEvent(MessageEvent $event): void
    {
        $messageDTO = MessageDTO::makeFromTwitch(
            utf8_encode($event->message),
            $event->tags->getTags()
        );

        $this->messageRepository->newMessage($messageDTO);
    }

    public function handleCheerEvent(CheerEvent $event): void
    {
        // handle your cheer event
    }

    public function handleSubEvent(SubEvent $event): void
    {
        // handle your sub event
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @return array
     */
    public function subscribe(): array
    {
        return [
            MessageEvent::class => [
                [__CLASS__, 'handleMessageEvent']
            ],
            CheerEvent::class => [
                [__CLASS__, 'handleMessageEvent']
            ],
            SubEvent::class => [
                [__CLASS__, 'handleMessageEvent']
            ],
        ];
    }
}
