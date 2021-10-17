<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Mail\VerificationEmail;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function login(){
        return view("user.login");
    }
    public function login_post(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password,"role"=>"user"])){
            $user = Auth::user();
            if($user->email_verification !== null){
                return redirect("/");
            }
            return redirect()->back()->withErrors("Please verification your email address.");
        }else{
            return redirect("/login")->withErrors("Doesn't exist this user.");
        }

    }

    public function register(){
        return view("user.register");
    }

    public function register_post(Request $request){
        $request->validate([
            "username"=>"required|unique:admins",
            "password" => "required",
            "descriptions" =>"required",
            "email"=>"required|unique:admins",
        ]);

        $user = new Admin();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->descriptions = $request->descriptions;
        $user->email_verification = null;
        $user->role = "user";
        $user->email_verification_token = (string) Str::uuid();
        $user->save();
        Mail::to($user->email)->send(new VerificationEmail($user));
        return redirect()->back()->with("success","We sent email verification mail. Please check your mail adress.");
    }

    public function email_verification($token){
        $user = Admin::where("role","user")->where("email_verification_token",$token)->first();
        $user->email_verification = Carbon::now("GMT+03:00");
        $user->email_verification_token = null;
        $user->save();
        return redirect("/login")->with("success","Email verification successfully. Please try to login.");
    }

    public function reset_password(){
        return view("user.reset-password");
    }

    public function reset_password_post(Request $request){
        $request->validate([
            "email"=>"required",
        ]);

        $user = Admin::where("email",$request->email)->where("role","user")->firstOrFail();
        $user->reset_password_token = (string) Str::uuid();
        $user->reset_password_expired_date = Carbon::now("GMT+03:00")->addMinutes(15);
        $user->save();
        Mail::to($user->email)->send(new ResetPassword($user));
        return redirect()->back()->with("success","We sent email for reset password. Please check your mail address.");
    }

    public function reset_password_check($token){
        $user = Admin::where("reset_password_token",$token)->where("role","user")->firstOrFail();
        if(Carbon::make($user->reset_password_expired_date)->isPast()){
            return redirect("/reset-password")->withErrors("Your link expired.");
        }

        return view("user.new-password",compact("user"));
    }

    public function new_password(Request $request){
        $request->validate([
            "token"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $user = Admin::where("reset_password_token",$request->token)->where("email",$request->email)->where("role","user")->firstOrFail();
        if(Carbon::make($user->reset_password_expired_date)->isPast()){
            return redirect("/reset-password")->withErrors("Your link expired.");
        }
        if(Hash::check($request->password,$user->password)){
            $user->reset_password_token = null;
            $user->reset_password_expired_date = null;
            $user->save();
            return redirect("/login")->withErrors("New password can not be same old password.");
        }
        $user->password = Hash::make($request->password);
        $user->reset_password_token = null;
        $user->reset_password_expired_date = null;
        $user->save();
        return redirect("/login")->with("success","Your password change by successfully.");
    }
}
