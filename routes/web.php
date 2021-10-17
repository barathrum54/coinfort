<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,"index"]);
/*
Route::get("/blog",[HomeController::class,"blog_index"]);
Route::get("/blog/{slug}/{id}",[HomeController::class,"single_blog"]);
Route::get("/category/{slug}",[HomeController::class,"single_category"]);
*/
Route::get("/contact",[ContactController::class,"contact"]);
Route::post("/contact",[ContactController::class,"contact_post"]);
Route::post("/vote",[VoteController::class,"vote"]);
Route::post("/checkVotes",[VoteController::class,"checkVotes"]);
Route::get("/checkVotes",[VoteController::class,"checkVotes"]);
Route::get("/promote",[HomeController::class,"promote"]);
Route::get("/work-with-us",[HomeController::class,"workWithUs"]);
Route::get("/privacy-policy",[HomeController::class,"privacyPolicy"]);
Route::get("/terms-conditions",[HomeController::class,"termsConditions"]);
Route::get("/disclaimer",[HomeController::class,"disclaimer"]);
Route::get("/coin/{id}",[HomeController::class,"detail_coin"]);

Route::get("/add-coin",[ApplicationController::class,"form"]);

Route::get("/admin/applications",[ApplicationController::class,"index"]);
Route::post("/admin/applications",[ApplicationController::class,"store"]);
Route::get("/admin/applications/{id}",[ApplicationController::class,"detail"]);
Route::get("/admin/applications/d/{id}",[ApplicationController::class,"delete"]);
Route::post("/admin/applications/a/{id}",[ApplicationController::class,"apply"]);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/login",[UserController::class,"login"]);
Route::post("/login",[UserController::class,"login_post"]);
Route::get("/register",[UserController::class,"register"]);
Route::post("/register",[UserController::class,"register_post"]);
Route::get("/email-verification/{token}",[UserController::class,"email_verification"]);
Route::get("/reset-password",[UserController::class,"reset_password"]);
Route::get("/reset-password/{token}",[UserController::class,"reset_password_check"]);
Route::post("/reset-password/new-password",[UserController::class,"new_password"]);
Route::post("/reset-password",[UserController::class,"reset_password_post"]);
Route::prefix("/users")->middleware("isUser")->group(function(){

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/admin/login",[AuthController::class,"login"]);
Route::post("/admin/login",[AuthController::class,"login_post"]);

Route::prefix("/admin")->middleware("isAdmin")->group(function(){

    Route::get("/logout",[AuthController::class,"logout"]);

    Route::prefix("/coins")->group(function (){
        Route::get("/",[CoinController::class,"index"]);
        Route::get("/create",[CoinController::class,"create"]);
        Route::post("/",[CoinController::class,"store"]);
        Route::get("/{id}/edit",[CoinController::class,"edit"]);
        Route::post("/{id}",[CoinController::class,"update"]);
        Route::delete("/{id}",[CoinController::class,"destroy"]);
    });

    Route::prefix("/categories")->group(function(){
        Route::get("/",[CategoryController::class,"index"]);
        Route::get("/create",[CategoryController::class,"create"]);
        Route::post("/",[CategoryController::class,"store"]);
        Route::get("/{id}/edit",[CategoryController::class,"edit"]);
        Route::put("/{id}",[CategoryController::class,"update"]);
        Route::delete("/{id}",[CategoryController::class,"destroy"]);
    });

    Route::prefix("/articles")->group(function(){
        Route::get("/",[ArticleController::class,"index"]);
        Route::get("/create",[ArticleController::class,"create"]);
        Route::post("/",[ArticleController::class,"store"]);
        Route::get("/{id}/edit",[ArticleController::class,"edit"]);
        Route::put("/{id}",[ArticleController::class,"update"]);
        Route::delete("/{id}",[ArticleController::class,"destroy"]);
    });

    Route::prefix("/ads")->group(function(){
        Route::get("/",[AdsController::class,"index"]);
        Route::get("/create",[AdsController::class,"create"]);
        Route::post("/",[AdsController::class,"store"]);
        Route::get("/{id}/edit",[AdsController::class,"edit"]);
        Route::put("/{id}",[AdsController::class,"update"]);
        Route::delete("/{id}",[AdsController::class,"destroy"]);
    });

});
