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
class LanguageTransformer extends Fractal\TransformerAbstract
{

	public function transform( $language ) {
	    return [
            'id'=>$language->id,
            'code'=>$language->code,
            'name'=>$language->name,

            'created_at'=>(string)$language->created_at,
            'updated_at'=>(string)$language->updated_at,
	    ];
	}

}
