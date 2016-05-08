<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuoteTest extends TestCase
{

    use DatabaseMigrations;

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
     * Saving new quote to database
     *
     * @return void
     */
    public function testNewQuote()
    {

        $response = $this->call( 'POST', '/api/quotes', [
            "data"=>[
                "content"=>[
                    "data"=>[
                        "id"=>16,
                        "text"=>"Cumque impedit mollitia quis. Debitis rerum repellendus aliquid perspiciatis quisquam officia. Rerum est excepturi quaerat.",
                        "language_id"=>8,
                        "language"=>[
                            "data"=>[
                                "id"=>8,
                                "code"=>"bi",
                                "name"=>"Bislama",
                            ]
                        ]
                    ]
                ],
                "author_id"=>1,
                "author"=>[
                    "data"=>[
                        "id"=>1,
                        "name"=>"Aryanna Treutel",
                        "description"=>"Suscipit nostrum dolores et. Perferendis voluptatum non veritatis harum quia quos et nisi. Voluptas aut distinctio enim. Repudiandae modi suscipit culpa consequatur sunt qui.",
                        "link"=>"http://brakus.com/et-autem-impedit-dicta-saepe-sed",
                        "born"=>"1955-05-01",
                        "died"=>"2015-06-26",
                        "created_at"=>"2016-05-07 21:32:39",
                        "updated_at"=>"2016-05-07 21:32:39"
                    ],
                ]
            ]
        ] );
        $this->assertEquals(201, $response->status());

    }



    /**
     * Test the basic quotes
     * /quotes
     *
     * @return void
     */
    public function testGetBaseQuotes()
    {

        // Get all the quotes
        $response = $this->get( '/api/quotes' )
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

    }

    /**
     * Test the /users/{user}/quotes
     *
     * @return
     */
    public function testGetUserQuotes()
    {
        // Get all user favorites the quotes
        $response = $this->get( '/api/users/1/quotes' )
            ->seeJsonStructure( $this->quoteFormat );

        // Get single user quote
        $response = $this->get( '/api/users/1/quotes/random' )
            ->seeJsonStructure( [
                'data'=>$this->singleQuoteFormat
            ] );
    }

}
