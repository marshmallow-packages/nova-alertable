<?php

use Illuminate\Support\Facades\Route;
use Marshmallow\Alertable\Http\Controllers\InitializePusherController;

Route::get('/initialize-pusher', InitializePusherController::class);
