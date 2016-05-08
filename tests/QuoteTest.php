<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuoteTest extends TestCase
{

    protected $quote = null;
    protected $quoteContentFormat = null;

    /**
     * @param mixed
     */
    public function __construct()
    {
        $this->quoteContentFormat = [
            'data'=>[
                'id',
                'text',
            ]
        ];
        $this->quoteFormat = [
            'data'=>[
                '*'=>[
                    'id',
                    'content'=>$this->quoteContentFormat,
                ],
            ]
        ];
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $response = $this->get( '/api/quotes' )
            ->seeJsonStructure( $this->quoteFormat );

        // $this->assertTrue(true);
    }
}
