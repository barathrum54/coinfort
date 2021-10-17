<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $apps = Application::all();
        return view('admin.applications.index',compact('apps'));
    }
    public function store(Request $request)
    {
        $application = new Application();
        $application->name = $request->name;
        $application->description = $request->description;
        $application->website = $request->website;
        $application->symbol = $request->symbol;
        $application->telegram = $request->telegram;
        $application->twitter = $request->twitter;
        $application->discord = $request->discord;
        $application->reddit = $request->reddit;
        $application->market_cap = $request->market_cap;
        $application->price_in_usd = $request->price_in_usd;
        $application->logo = $request->logo;
        $application->launch_date = $request->launch_date;
        $application->contract_adress = $request->contract_adress;
        $application->info = $request->info;
        $application->chain = $request->chain;
        $application->contact = $request->contact;
        $application->save();
        return redirect()->back()->with("success","Posted Coin for review, a staff member will contact you soon.");
    }
    public function detail(Request $request, $id)
    {
        $app = Application::where('id',$id)->first();
        return view('admin.applications.detail',compact('app'));
    }
    public function delete(Application $app)
    {
        $app->delete();
        return redirect()->back();
    }
    public function apply(Request $request, $id)
    {
        $application = Application::where('id',$id)->first();
        $coin = new Coin();
        $coin->name = $application->name;
        $coin->description = $application->description;
        $coin->website = $application->website;
        $coin->symbol = $application->symbol;
        $coin->telegram = $application->telegram;
        $coin->twitter = $application->twitter;
        $coin->discord = $application->discord;
        $coin->reddit = $application->reddit;
        $coin->market_cap = $application->market_cap;
        $coin->price = $application->price_in_usd;
        $coin->icon = $application->logo;
        $coin->launch_date = $application->launch_date;
        $coin->contract_adress = $application->contract_adress;
        $coin->info = $application->info;
        $coin->chain = $application->chain;
        $coin->contact = $application->contact;
        $coin->votes = 0;
        $coin->save();
        $application->delete();
        return redirect("/admin/coins");
    }
    public function form()
    {

        return view('admin.applications.form');
    }

}
