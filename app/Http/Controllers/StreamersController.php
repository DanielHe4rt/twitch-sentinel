<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StreamersController extends Controller
{
    public function postStreamer(Request $request)
    {
        $validated = $this->validate($request, [
            'provider_id' => ['string', 'required'],
            'provider_name' => ['string', 'required']
        ]);

        $validated['created_at'] = Carbon::now();
        Streamer::create($validated);

        return response()->json();
    }
}
