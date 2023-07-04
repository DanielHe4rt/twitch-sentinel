<?php

namespace Database\Seeders;

use App\Models\Streamer;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('sentinel.streamers') as $streamer)
            Streamer::create([
                'created_at' => Timestamp::fromDateTime(Carbon::now()->toDateTime()),
            ...$streamer
        ]);
    }
}
