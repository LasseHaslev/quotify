<?php

use App\Http\Controllers\QuotesApiController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get( 'quotes', QuotesApiController::class . '@index' );
    $api->get( 'quotes/{quote}', QuotesApiController::class . '@show' );
    // $api->get('users/{id}', 'App\Api\Controllers\UserController@show');
});

Route::get('/', function () {
    return view('welcome');
});
