<?php

namespace App\Http\Controllers;

use App\Models\MessageCount;
use App\Models\Streamer;
use Carbon\Carbon;
use Cassandra\Timestamp;
use Illuminate\Http\Request;

class StreamersController extends Controller
{
    public function viewStreamers()
    {
        return view('streamers.index', [
            'streamers' => Streamer::paginate()
        ]);
    }

    public function viewCreateStreamer()
    {
        return view('streamers.create');
    }

    public function postStreamer(Request $request)
    {
        $validated = $this->validate($request, [
            'streamer_username' => ['string', 'required']
        ]);

        $streamer = new Streamer();
        $streamer->streamer_id = $validated['streamer_id'];
        $streamer->streamer_username = $validated['streamer_username'];
        $streamer->created_at = Timestamp::fromDateTime(Carbon::now()->toDateTime());
        $streamer->save();


        return response()->redirectToRoute('streamers.index');
    }
}
