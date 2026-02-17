<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class ThingsBoardController extends Controller
{
    public function index(Request $request){
        $thingsboard_data = $request->all();
        Log::info("THINGS BOARD DATA");
        Log::info($thingsboard_data);
    }
}
