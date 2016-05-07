<?php

namespace App\Transformers;

use League\Fractal;

/**
 * Class QuoteLanguageTransformer
 * @author Lasse S. Haslev
 */
class QuoteLanguageTransformer extends Fractal\TransformerAbstract
{
	public function transform( $quote) {
	    return [
	        'id'      => (int) $quote->id,
	        'text'   => $quote->text,
	        'language_id'   => $quote->language_id,
	    ];
	}
}
