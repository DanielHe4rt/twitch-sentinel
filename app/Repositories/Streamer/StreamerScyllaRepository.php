<?php

namespace App\Repositories\Streamer;

use App\Models\Streamer;
use DanielHe4rt\Scylloquent\Collection;
use Illuminate\Support\Facades\DB;

class StreamerScyllaRepository implements StreamerRepository
{

    public function getStreamers(): Collection
    {
        return DB::table('streamers')->get();
    }
}
