<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Quote;
use App\Author;

class StoreQuote extends Job
{
    use InteractsWithQueue, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $data )
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $author = Author::find( array_get( $this->data, 'author.data.id' ) );

        $quote = $author->quotes()->create([]);

        $contentData = array_get( $this->data, 'content.data' );
        $contentData[ 'language_id' ] = array_get( $this->data, 'content.data.language_id' ) ?: array_get( $this->data, 'content.data.language.data.id' );
        $quote->contents()->create( $contentData );

        return $quote;
    }
}
