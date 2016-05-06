<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

    protected $fillable = [
        'name',
    ];

    /**
     * Get all the users that has this role
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany( User::class );
    }


}
