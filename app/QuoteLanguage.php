<?php

namespace App;

use App\Quote;
use App\Language;
use Illuminate\Database\Eloquent\Model;

class QuoteLanguage extends Model
{

    protected $fillable = [
        'text',
        'language_id',
    ];

    /**
     * Connect this lang to the quote
     *
     * @return void
     */
    public function quote()
    {
        return $this->belongsTo( Quote::class );
    }

    /**
     * Get the language for this quote content
     *
     * @return void
     */
    public function language()
    {
        return $this->belongsTo( Language::class );
    }


}
