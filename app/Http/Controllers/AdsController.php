<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\AdsType;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        $ads = Ads::orderBy("id","DESC")->get();
        return view("admin.ads.index",compact("ads"));
    }

    public function create(){
        
        $ads = Ads::orderBy("id","DESC")->get();
        return view("admin.ads.create");
    }

    public function store(Request $request){
        $ads = Ads::create($request->all());
        $ads->type = $request->type;
        $ads->url = $request->url;
        $ads->photo = $request->photo;

        $ads->save();

        return redirect("/admin/ads")->with("success","Create event success.");

    }

    public function edit($id){
        $ads = Ads::findOrFail($id);
        $ads_type = AdsType::orderBy("id","DESC")->get();

        return view("admin.ads.update",compact("ads","ads_type"));
    }

    public function update(Request $request,$id){
        $request->validate([
            "type_id"=>"required",
            "url"=>"required",
            "photo"=>"required",
        ]);

        $ads = Ads::findOrFail($id);
        $ads->typeId = $request->type_id;
        $ads->url = $request->url;
        $ads->photo = $request->photo;
        $ads->save();


        return redirect("/admin/ads")->with("success","Update event success.");

    }

    public function destroy(Request $request){
        $ads = Ads::findOrFail($request->id);
        $ads->delete();

        return redirect()->back()->with("success","Deleting successfully");
    }
}
