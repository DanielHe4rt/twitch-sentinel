<?php

namespace App\Models;

use DanielHe4rt\Scylloquent\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Streamer extends Model
{
    use HasFactory;

    protected $table = 'streamers';

    protected $fillable = [
        'streamer_id',
        'streamer_username',
        'is_online',
        'created_at'
    ];

    public function getMessagesCount(): int
    {
        $query = MessageCount::query()
            ->where('streamer_id', $this->attributes['streamer_id'])
            ->first();

        return $query?->toArray()['messages_count'] ?: 0;
    }
}
