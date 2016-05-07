<?php

use App\Http\Controllers\QuotesApiController;
use App\Http\Controllers\AuthorsApiController;

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

    // Quotes
    $api->get( 'quotes', QuotesApiController::class . '@index' );
    $api->get( 'quotes/random', QuotesApiController::class . '@random' );
    $api->get( 'quotes/{quote}', QuotesApiController::class . '@show' );
    // $api->get('users/{id}', 'App\Api\Controllers\UserController@show');

    // Author
    $api->get( 'authors', AuthorsApiController::class . '@index' );
    $api->get( 'authors/{author}', AuthorsApiController::class . '@show' );

});

Route::get('/', function () {
    return view('welcome');
});
