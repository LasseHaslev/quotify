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
class AuthorTransformer extends Fractal\TransformerAbstract
{

	public function transform( $quote ) {
	    return [
            'id'=>$quote->id,
            'name'=>$quote->name,
            'description'=>$quote->description,
            'link'=>$quote->link,
            'born'=>(string)$quote->born,
            'died'=>(string)$quote->died,
	    ];
	}

}
