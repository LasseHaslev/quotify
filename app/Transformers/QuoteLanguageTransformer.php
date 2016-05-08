<?php

namespace App\Transformers;

use League\Fractal;

/**
 * Class QuoteLanguageTransformer
 * @author Lasse S. Haslev
 */
class QuoteLanguageTransformer extends Fractal\TransformerAbstract
{

    // Get the available includes
    protected $defaultIncludes = [
        'language'
    ];

	public function transform( $quote ) {
	    return [
	        'id'      => (int) $quote->id,
	        'text'   => $quote->text,

            'created_at'=>(string)$quote->created_at,
            'updated_at'=>(string)$quote->updated_at,
	    ];
	}

    /**
     * Get the Language for this quote
     *
     * @return void
     */
    public function includeLanguage( $quoteLanguage )
    {
        return $this->item( $quoteLanguage->language, new LanguageTransformer );
    }

}
