<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Support\Facades\Log;
class TwitterApiController extends Controller
{

    public function getTweetsOfUserName(Request $request){
        $userName = $request->userName;
        $tweet = [];
        try
        {
            $tweet = Twitter::getUserTimeline(['screen_name' => $userName,'count' => 5, 'format' => 'array']);
        }
        catch (Exception $e)
        {
            Log::debug(Twitter::logs());
        }
       return view('tweets')->with('tweets',$tweet);
    }
}
