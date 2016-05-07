<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quote;

class QuoteLanguage extends Model
{

    /**
     * Connect this lang to the quote
     *
     * @return void
     */
    public function quote()
    {
        return $this->belongsTo( Quote::class );
    }

}
