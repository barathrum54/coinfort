<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Article;
use App\Models\Category;
use App\Models\Coin;
use \Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $all_coins = Coin::where("promoted", false)->orderByRaw('CONVERT(votes, SIGNED) desc')->get();
        foreach ($all_coins as $key => $coin) {
            $ip_array = json_decode($coin->ip_array);
            if ($ip_array != null && $ip_array != []) {
                # code...
                foreach ($ip_array as $key => $obj) {
                    $time = Carbon::parse($obj->time);
                    $timeDifference = $time->diffInMinutes(Carbon::now());
                    if ($obj->ip == $request->ip() && $timeDifference < 1) {
                        $coin->voted = true;
                    }
                }
            }
        }



        $promoted_coins = Coin::where("promoted", true)->orderByRaw('CONVERT(votes, SIGNED) desc')->get();
        foreach ($promoted_coins as $promoted_coin) {
            if ($promoted_coin->votes !== null) {
                $promoted_coin->votes = json_decode($promoted_coin->votes, true);
            } else {
                $promoted_coin->votes = 0;
            }
        }
        foreach ($all_coins as $all_coin) {
            if ($all_coin->votes !== null) {
                $all_coin->votes = json_decode($all_coin->votes, true);
            } else {
                $all_coin->votes = 0;
            }
        }
        foreach ($all_coins as $key => $coin) {

            $ip_array = json_decode($coin->ip_array);
            if ($ip_array != null && $ip_array != []) {
                $coin->launch_date = Carbon::parse($coin->launch_date)->diffForHumans();

                foreach ($ip_array as $key => $obj) {
                    $time = Carbon::parse($obj->time);
                    $timeDifference = $time->diffInMinutes(Carbon::now());
                    if ($obj->ip == $request->ip() && $timeDifference < 1) {
                        $coin->voted = true;
                    }
                }
            }
        }
        foreach ($promoted_coins as $key => $coin) {
            $ip_array = json_decode($coin->ip_array);
            if ($ip_array != null && $ip_array != []) {
                $coin->launch_date = Carbon::parse($coin->launch_date)->diffForHumans();

                foreach ($ip_array as $key => $obj) {
                    $time = Carbon::parse($obj->time);
                    $timeDifference = $time->diffInMinutes(Carbon::now());
                    if ($obj->ip == $request->ip() && $timeDifference < 1) {
                        $coin->voted = true;
                    }
                }
            }
        }


        $ads1 = Ads::where('type', 1)->get();
        $ads2 = Ads::where('type', 2)->get();
        $allTime = Coin::orderByRaw('CONVERT(votes, SIGNED) desc')->get();
        $presale = Coin::where('market_cap',"Presale")->orderByRaw('CONVERT(votes, SIGNED) desc')->get();
        $hot = Coin::whereDate('created_at', Carbon::yesterday())->orderByRaw('CONVERT(votes, SIGNED) desc')->get();
        /*if (count($hot) == 0) {
            $hot = $allTime;
        }*/
        $hot = $allTime;
        return view("home", compact("all_coins", "promoted_coins", "ads1", "ads2","allTime","presale","hot"));
    }
    public function blog_index()
    {
        $cache = Cache::remember("blog", 120, function () {
            $articles = Article::orderBy("id", "DESC")->get();
            $categories = Category::orderBy("id", "DESC")->get();
            return view("", compact("articles", "categories"));
        });
        return $cache;
    }

    public function single_blog($slug, $id)
    {
        $article = Article::where("slug", $slug)->where("id", $id)->firstOrFail();
        return view("", compact("article"));
    }

    public function single_category($slug)
    {
        $categories = Category::orderBy("id", "DESC")->get();
        $category = Category::where("slug", $slug)->firstOrFail();
        return view("", compact("categories", "category"));
    }

    public function promote()
    {
        return view("promote");
    }
    public function workWithUs()
    {
        return view("workWithUs");
    }
    public function detail_coin(Request $request, $id)
    {
        $coin = Coin::where("id", $id)->first();
            $ip_array = json_decode($coin->ip_array);
            if ($ip_array != null && $ip_array != []) {
                # code...
                foreach ($ip_array as $key => $obj) {
                    $time = Carbon::parse($obj->time);
                    $timeDifference = $time->diffInMinutes(Carbon::now());
                    if ($obj->ip == $request->ip() && $timeDifference < 1) {
                        $coin->voted = true;
                    }
                }
        }
        return view("coindetail", compact("coin"));
    }
    public function privacyPolicy()
    {
        return view('privacyPolicy');
    }
    public function termsConditions()
    {
        return view('termsConditions');
    }
    public function disclaimer()
    {
        return view('disclaimer');
    }
}
