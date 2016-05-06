<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuoteContainer;

class Author extends Model
{
    /**
     * Get references to all quotes from this author
     *
     * @return void
     */
    public function quotes()
    {
        return $this->hasMany( QuoteContainer::class );
    }

}
