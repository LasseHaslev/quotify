<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuoteTest extends TestCase
{

    protected $singleQuoteFormat = null;
    protected $quoteFormat = null;
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
        $this->singleQuoteFormat = [
            'id',
            'content'=>$this->quoteContentFormat,
        ];
        $this->quoteFormat = [
            'data'=>[
                '*'=>$this->singleQuoteFormat,
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

        // Get all the quotes
        $response = $this->get( '/api/quotes' )
            ->seeJsonStructure( $this->quoteFormat );

        // Get all user favorites the quotes
        $response = $this->get( '/api/users/1/quotes' )
            ->seeJsonStructure( $this->quoteFormat );


        // Get single quote
        $response = $this->get( '/api/quotes/1' )
            ->seeJsonStructure( [
                'data'=>$this->singleQuoteFormat
            ] );

        // Get single random quote
        $response = $this->get( '/api/quotes/random' )
            ->seeJsonStructure( [
                'data'=>$this->singleQuoteFormat
            ] );

        // Get single user quote
        $response = $this->get( '/api/users/1/quotes/random' )
            ->seeJsonStructure( [
                'data'=>$this->singleQuoteFormat
            ] );

        // $this->assertTrue(true);
    }
}
