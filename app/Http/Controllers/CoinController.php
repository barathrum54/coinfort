<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{

    public function index(){
        $coins = Coin::orderBy("updated_at","DESC")->paginate(25);
        foreach ($coins as $coin){
            if($coin->votes !== null ){
                $coin->votes = json_decode($coin->votes);
            }else{

                $coin->votes = 0;
            }
        }
        return view("admin.coin.index",compact("coins"));
    }

    public function create()
    {
        return view("admin.coin.create");
    }

    public function store(Request $request)
    {

        $coin = new Coin();
        $coin->name = $request->name;
        $coin->symbol = $request->symbol;
        $coin->description = $request->description;
        $coin->icon = $request->icon;
        $coin->launch_date = $request->launch_date;
        $coin->telegram = $request->telegram;
        $coin->website = $request->website;
        $coin->twitter = $request->twitter;
        $coin->discord = $request->discord;
        $coin->reddit = $request->reddit;
        $coin->market_cap = $request->market_cap;
        $coin->promoted = $request->promoted;
        $coin->price = $request->price;
        $coin->votes = 0;

        $coin->save();

        return redirect()->back()->with("success","Coin başarılı bir şekilde oluşturuldu.");

    }

    public function edit($id)
    {
        $coin = Coin::where("id",$id)->firstOrFail();
        return view("admin.coin.update",compact("coin"));
    }

    public function update(Request $request,$id){
        $coin = Coin::findOrFail($id);
        $coin->name = $request->name;
        $coin->symbol = $request->symbol;
        $coin->description = $request->description;
        $coin->icon = $request->icon;
        $coin->launch_date = $request->launch_date;
        $coin->telegram = $request->telegram;
        $coin->website = $request->website;
        $coin->twitter = $request->twitter;
        $coin->discord = $request->discord;
        $coin->reddit = $request->reddit;
        $coin->market_cap = $request->market_cap;
        $coin->price = $request->price;


        $coin->promoted = $request->promoted;
        $coin->save();

        return redirect()->back()->with("success","Update event successfully");

    }

    public function destroy(Request $request){
        $coin = Coin::where("id",$request->id)->firstOrFail();
        $coin->delete();
        return redirect()->back()->with("success","Delete event successfully.");
    }
    public function applications(Request $request)
    {
        $coins = '';
        return view('admin.applications.index',compact('coins'));
    }

}
