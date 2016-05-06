<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Quote;

class QuoteContainer extends Model
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
    public function quotes()
    {
        return $this->hasMany( Quote::class );
    }


}
