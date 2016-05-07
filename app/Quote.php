<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\QuoteLanguage;

class Quote extends Model
{

    /**
     * Get reference to the author who said it
     *
     * @return void
     */
    public function author()
    {
        return $this->belongsTo( Author::class );
    }

    /**
     * Get all quotes with all languages
     *
     * @return void
     */
    public function languages()
    {
        return $this->hasMany( QuoteLanguage::class );
    }


}
