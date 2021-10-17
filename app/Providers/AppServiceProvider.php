<?php

namespace App\Providers;
use App\Models\Ads;
use App\Models\Coin;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view) {
        $ads1 = Ads::where('type', 1)->get();
      
        $view->with('ads1',$ads1);
        });  
         view()->composer('*', function($view) {
            $promoted_coins = Coin::where("promoted", true)->orderByRaw('CONVERT(votes, SIGNED) desc')->get();
            foreach ($promoted_coins as $promoted_coin) {
                if ($promoted_coin->votes !== null) {
                    $promoted_coin->votes = json_decode($promoted_coin->votes, true);
                } else {
                    $promoted_coin->votes = 0;
                }
            }
            $request = $this->app->request;
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
        $view->with('promoted_coins',$promoted_coins);
        });
    }
}
