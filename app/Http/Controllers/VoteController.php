<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request){
        $coin = Coin::where("id",$request->coin_id)->firstOrFail();
        $coin->votes += rand(1,500);
        $ip_array = [];
        $obj = (object)[];
        $obj->time = Carbon::now();
        $obj->ip = $request->ip();
        array_push($ip_array,$obj);
        $coin->ip_array = json_encode($ip_array);
        $coin->save();
    }

    public function checkVotes(Request $request)
    {
        $coins = Coin::all();
        $returnvals = [];
        foreach ($coins as $key => $coin) {
            $ip_array =json_decode($coin->ip_array);
            foreach ($ip_array as $key => $obj) {
                $time = Carbon::parse($obj->time);
                $timeDifference = $time->diffInHours(Carbon::now());
                if ($obj->ip == $request->ip() && $timeDifference < 12 ){
                    array_push($returnvals,$coin->id);
                }
            }
        }
        return $returnvals;
    }
}
