<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StreamersController extends Controller
{
    public function viewStreamers()
    {
        return view('streamers.index');
    }
}
