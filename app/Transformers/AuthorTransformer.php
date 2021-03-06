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

    // Get the default includes
    protected $defaultIncludes = [
    ];

    // Get the available includes
    protected $availableIncludes = [
        'quotes'
    ];

	public function transform( $quote ) {
	    return [
            'id'=>$quote->id,
            'name'=>$quote->name,
            'description'=>$quote->description,
            'link'=>$quote->link,
            'born'=>(string)$quote->born,
            'died'=>(string)$quote->died,

            'created_at'=>(string)$quote->created_at,
            'updated_at'=>(string)$quote->updated_at,
	    ];
	}

    /**
     * Get this author quotes
     *
     * @return void
     */
    public function includeQuotes( $author )
    {
        return $this->collection( $author->quotes, new QuoteTransformer );
    }


}
