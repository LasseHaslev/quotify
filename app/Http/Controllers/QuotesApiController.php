<?php

namespace App\Http\Controllers;

use App\User;
use App\Quote;
use App\Author;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformers\QuoteTransformer;
use App\Transformers\QuoteLanguageTransformer;
use App\Jobs\StoreQuote;

class QuotesApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( User $user = null, Author $author = null )
    {

        // Deactivate eager loading for this request
        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) {
            return new \Dingo\Api\Transformer\Adapter\Fractal(new \League\Fractal\Manager, 'include', ',', false);
        });

        // If user is defined we use the favorites to get the info
        if ( $user->id ) {
            return $this->response->collection( $user->favorites, new QuoteTransformer );
        }

        // If user is defined we use the favorites to get the info
        if ( $author->id ) {
            return $this->response->collection( $author->quotes, new QuoteTransformer );
        }

        return $this->response->collection( Quote::all(), new QuoteTransformer );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = $this->dispatch( new StoreQuote( $request->get( 'data' ) ) );
        return $this->response->item( $quote, new QuoteTransformer )
            ->setStatusCode( 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Quote $quote )
    {
        return $this->response->item( $quote, new QuoteTransformer );
    }

    /**
     * Display a random resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function random( User $user = null, Author $author = null )
    {

        // If user is defined we use the favorites to get the info
        if ( $user->id ) {
            $quote = $user->favorites->random();
        }
        if ( $author->id ) {
            $quote = $author->quotes->random();
        }
        else {
            $quote = Quote::all()->random();
        }

        // return it
        return $this->response->item( $quote, new QuoteTransformer );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
