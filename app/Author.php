<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quote;

class Author extends Model
{

    protected $fillable = [
        'name',
        'description',
        'link',
        'born',
        'died',
    ];

    /**
     * Get references to all quotes from this author
     *
     * @return void
     */
    public function quotes()
    {
        return $this->hasMany( Quote::class );
    }

}
