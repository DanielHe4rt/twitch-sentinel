<?php

namespace App\Clients;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TwitchClient
{
    public function authenticate(): Response
    {
        return Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => config('sentinel.twitch.client_id'),
            'client_secret' => config('sentinel.twitch.client_secret'),
            'grant_type' => 'client_credentials',
            'redirect_uri' => config('sentinel.twitch.redirect_uri')
        ]);
    }

    public function getStreams(string $page = null)
    {
        $query = [
            'type' => 'live',
            'after' => $page,
            'first' => 100
        ];

        return Http::withHeaders([
            'Authorization' => 'Bearer ' . config('sentinel.twitch.app_bearer'),
            'Client-Id' => config('sentinel.twitch.client_id'),
        ])->get('https://api.twitch.tv/helix/streams', $query);
    }
}
