<?php

namespace App\Transformers;

use App\Language;
use League\Fractal;
use Illuminate\Http\Request;
use App\Transformers\QuoteLanguageTransformer;

/**
 * Class QuoteLanguageTransformer
 * @author Lasse S. Haslev
 */
class QuoteTransformer extends Fractal\TransformerAbstract
{

    protected $defaultIncludes = [
        'quoteLanguage',
    ];

	public function transform( $quote ) {
	    return [
	    ];
	}

    /**
     * undocumented function
     *
     * @return void
     */
    public function includeQuoteLanguage( $quote )
    {

        $request = app( Request::class );

        // Get the language code we want to use
        $languageCode = $request->get( 'lang' ) ?: $request->get( 'language' );
        $languageCode = $languageCode ?: $request->getLocale();

        // Get language
        $language = Language::where( 'code', $languageCode )->first();
        // Check if we have a quote on the requested language, else get the quotes first lang
        $quoteLang = $quote->languages()->where( 'language_id', $language->id )->first() ?: $quote->languages()->first();

        return $this->item( $quoteLang, new QuoteLanguageTransformer );
    }

}
