<?php

namespace App\Transformers;

use League\Fractal;

/**
 * Class QuoteTransformer
 * @author Lasse S. Haslev
 */
class QuoteTransformer extends Fractal\TransformerAbstract
{
	public function transform( $quote) {
	    return [
	        'id'      => (int) $quote->id,
	        'text'   => $quote->text,
	    ];
	}
}
