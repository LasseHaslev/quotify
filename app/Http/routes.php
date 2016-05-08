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

    // Users
    // $api->get( 'users/{user}/favorites', UsersApiController::class . '@favorites' );
    $api->get( 'users/{user}/quotes', QuotesApiController::class . '@index' );
    $api->get( 'users/{user}/quotes/random', QuotesApiController::class . '@random' );

    // Quotes
    $api->get( 'quotes', QuotesApiController::class . '@index' );
    $api->get( 'quotes/random', QuotesApiController::class . '@random' );
    $api->get( 'quotes/{quote}', QuotesApiController::class . '@show' );

    $api->post( 'quotes', QuotesApiController::class . '@store' );



    // Author
    $api->get( 'authors', AuthorsApiController::class . '@index' );
    $api->get( 'authors/{author}', AuthorsApiController::class . '@show' );
    $api->get( 'authors/{author}/quotes', QuotesApiController::class . '@index' );
    $api->get( 'authors/{author}/quotes/random', QuotesApiController::class . '@random' );

});

Route::get('/', function () {
    return view('welcome');
});
