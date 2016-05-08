<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Author;
use App\Quote;

class AuthorTest extends TestCase
{

    use DatabaseMigrations;

    protected $author;

    /**
     * Check if we can save new quote
     *
     * @return void
     * @test
     */
    public function can_save_new_quote()
    {
        $author = factory( Author::class )->create();

        $quote = $author->quotes()->save( factory( Quote::class )->make() );

        $this->assertEquals( Quote::class, get_class( $quote ) );
    }


    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function has_access_to_quotes()
    {
        $author = factory( Author::class )->create();

        $quote = $author->quotes()->saveMany( factory( Quote::class, 5 )->make() );

        $this->assertCount( 5, $author->quotes );
    }
}
