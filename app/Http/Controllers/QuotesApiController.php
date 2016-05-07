<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Request;
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
        return $this->response->collection( QuoteLanguage::all(), new QuoteLanguageTransformer );
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
    public function show( Request $request, Quote $quote )
    {

        // Get the language code we want to use
        $languageCode = $request->get( 'lang' ) ?: $request->get( 'language' );
        $languageCode = $languageCode ?: $request->getLocale();

        // Get language
        $language = Language::where( 'code', $languageCode )->first();
        // Check if we have a quote on the requested language, else get the quotes first lang
        $quoteLang = $quote->languages()->where( 'language_id', $language->id )->first() ?: $quote->languages()->first();

        return $this->response->item( $quoteLang, new QuoteLanguageTransformer );
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
