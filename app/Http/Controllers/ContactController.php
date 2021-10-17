<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        return view("");
    }

    public function contact_post(Request $request){
        $request->validate([
            "name"=>"required",
            "symbol"=>"required",
            "telegram"=>"required",
            "description"=>"required",
            "logo"=>"required",
            "launch_date"=>"required",
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->symbol = $request->symbol;
        $contact->description = $request->description;
        $contact->logo = $request->logo;
        $contact->launch_date = $request->launch_date;
        { $request->website ? $contact->website = $request->website : false;}
        { $request->twitter ? $contact->twitter = $request->twitter : false;}
        { $request->discord ? $contact->discord = $request->discord : false;}
        { $request->reddit ? $contact->reddit = $request->reddit : false;}
        { $request->market_cap ? $contact->market_cap = $request->market_cap : false;}
        { $request->price_in_usd ? $contact->price_in_usd = $request->price_in_usd : false;}
        { $request->other ? $contact->other = $request->other : false;}

        $contact->save();

        return redirect()->back()->with("success","En kısa sürede sizinle iletişime geçeceğiz. İlginiz için teşekkürler.");
    }
}
