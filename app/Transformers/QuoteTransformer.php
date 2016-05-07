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
        'content',
        'author',
    ];

	public function transform( $quote ) {
	    return [
            'id'=>$quote->id,
	    ];
	}

    /**
     * Default include the Quote language for this resource
     * We also select language based on ?lang={lang code} and ?language={lang code}
     * If none of them is selected, we first check if we got an english quote
     * else we get the first applied lang
     *
     * @return void
     */
    public function includeContent( $quote )
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

    /**
     * Connect to this author
     *
     * @return void
     */
    public function includeAuthor( $quote )
    {
        return $this->item( $quote->author, new AuthorTransformer );
    }


}
