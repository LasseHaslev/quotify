<?php

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Jobs\StoreAuthor;
use App\Author;

class StoreAuthorTest extends TestCase
{

    use DispatchesJobs;

    public $authorDataFormat = [
        "data"=>[
            "name"=>"Aryanna Treutel",
            "description"=>"Suscipit nostrum dolores et. Perferendis voluptatum non veritatis harum quia quos et nisi. Voluptas aut distinctio enim. Repudiandae modi suscipit culpa consequatur sunt qui.",
            "link"=>"http://brakus.com/et-autem-impedit-dicta-saepe-sed",
            "born"=>"1955-05-01",
            "died"=>"2015-06-26",
        ],
    ];

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function store_new_author()
    {
        $author = $this->dispatch( new StoreAuthor( $this->authorDataFormat ) );
        $this->assertTrue( $author->exists() );
    }

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function return_existing_if_exists()
    {
        $author = factory( Author::class )->create();
        $data = array_add( $this->authorDataFormat, 'data.id', $author->id );

        $newAuthor = $this->dispatch( new StoreAuthor( $data ) );

        $this->assertEquals( $author->id, $newAuthor->id );
    }
}
