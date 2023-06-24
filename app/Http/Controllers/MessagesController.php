<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessagesController extends Controller
{
    public function viewMessages(string $streamerId)
    {
        $messages = Message::query()
            ->where('streamer_id', $streamerId)
            ->orderByDesc('sent_at')
            ->paginate();

        return view('streamers.messages.index', ['messages' => $messages]);
    }
}
