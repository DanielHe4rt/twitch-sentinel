<?php

namespace App\Models;

use DanielHe4rt\Scylloquent\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Streamer extends Model
{
    use HasFactory;

    protected $table = 'streamers';

    protected $fillable = [
        'username'
    ];
}
