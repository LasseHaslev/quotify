<?php

use App\Quote;
use App\Author;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\QuoteLanguage;

class QuoteModelTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Check if the quote has access to its author
     *
     * @test
     * @return void
     */
    public function has_access_to_author()
    {
        $author = factory( Author::class )->create();

        $quote = $author->quotes()->save( factory( Quote::class )->make() );

        $this->assertEquals( Author::class, get_class( $quote->author ) );
    }

    /**
     * Has access to contents
     *
     * @test
     * @return void
     */
    public function has_access_to_contents()
    {
        $author = factory( Author::class )->create();

        $quote = $author->quotes()->save( factory( Quote::class )->make() );

        $quote->contents()->saveMany( factory( QuoteLanguage::class, 5 )->make() );

        $this->assertCount( 5, $quote->contents );
    }
}
