<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

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


}
