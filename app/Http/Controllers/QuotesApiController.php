<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformers\QuoteTransformer;
use App\Transformers\QuoteLanguageTransformer;

class QuotesApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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
    public function random()
    {
        $quote = Quote::all()->random();
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
