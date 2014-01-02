<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Route::group(["before" => "auth"], function()
// {
    Route::model("event", "Event");

    Route::get("event", [
        "as"   => "event/index",
        "uses" => "EventController@index"
    ]);

    Route::get("event/total", [
        "as"   => "event/total",
        "uses" => "EventController@total"
    ]);

    Route::get("event/today", [
        "as"   => "event/today",
        "uses" => "EventController@today"
    ]);

    Route::post("event", [
        "as"   => "event/store",
        "uses" => "EventController@store"
    ]);

    Route::get("event/{event}", [
        "as"   => "event/show",
        "uses" => "EventController@show"
    ]);

    Route::put("event/{event}", [
        "as"   => "event/update",
        "uses" => "EventController@update"
    ]);

    Route::delete("event/{event}", [
        "as"   => "event/destroy",
        "uses" => "EventController@destroy"
    ]);
// });