<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Transformers\QuoteTransformer;

class UsersApiController extends ApiController
{

    /**
     * Get the users favorites
     *
     * @return void
     */
    public function favorites( User $user )
    {
        // Deactivate eager loading for this request
        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) {
            return new \Dingo\Api\Transformer\Adapter\Fractal(new \League\Fractal\Manager, 'include', ',', false);
        });

        return $this->response->collection( $user->favorites, new QuoteTransformer );
    }


}
