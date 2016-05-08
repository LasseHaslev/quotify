<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Quote;

class UserModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function can_access_favorites()
    {
        $quotes = factory( Quote::class,5 )->create();
        $user = factory( User::class )->create();

        $user->favorites()->attach( $quotes[0] );

        $this->assertCount( 1, $user->favorites );

    }
}
