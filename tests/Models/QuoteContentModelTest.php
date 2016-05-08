<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\QuoteLanguage;
use App\Quote;

class QuoteContentModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function check_if_we_can_access_quote()
    {
        $quoteContent = factory( QuoteLanguage::class )->create();

        $this->assertEquals( Quote::class, get_class( $quoteContent->quote ) );
    }
}
