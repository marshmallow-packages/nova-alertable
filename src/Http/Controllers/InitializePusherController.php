<?php

namespace Marshmallow\Alertable\Http\Controllers;

use Illuminate\Http\Request;

class InitializePusherController
{
    public function __invoke()
    {
        return response()->json([
            'user_id' => auth()->user()->id,
            'key' => config('broadcasting.connections.pusher.key'),
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
        ]);
    }
}
