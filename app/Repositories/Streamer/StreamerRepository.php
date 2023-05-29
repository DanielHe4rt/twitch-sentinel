<?php

namespace App\Repositories\Streamer;

use DanielHe4rt\Scylloquent\Collection;

interface StreamerRepository
{

    public function getStreamers(): Collection;
}
