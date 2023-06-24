<?php

namespace App\Models;


use DanielHe4rt\Scylloquent\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $connection = 'scylla';

    protected $table = 'messages';

    protected $fillable = [
        'streamer_id',
        'chatter_id',
        'chatter_username',
        'chatter_badges',
        'chatter_message',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime'
    ];

}
