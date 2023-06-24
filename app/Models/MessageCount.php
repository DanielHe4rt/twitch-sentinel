<?php

namespace App\Models;

use DanielHe4rt\Scylloquent\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessageCount extends Model
{
    use HasFactory;

    protected $connection = 'scylla';

    protected $table = 'messages_count';

    protected $fillable = [
        'streamer_id',
        'messages_count'
    ];

}
