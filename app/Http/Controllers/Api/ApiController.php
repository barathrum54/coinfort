<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coin;

class ApiController extends Controller
{
    public function index(){
        $coins = Coin::orderBy("id","DESC")->get();
        return response($coins,200);
    }
}
