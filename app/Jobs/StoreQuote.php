<?php

namespace App\Jobs;

use App\Quote;
use App\Author;
use App\Jobs\Job;
use App\Jobs\StoreAuthor;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

class StoreQuote extends Job
{
    use InteractsWithQueue, SerializesModels, DispatchesJobs;

    protected $request;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $request, $data )
    {
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $author = $this->dispatch( new StoreAuthor( array_get( $this->data, 'author' ) ) );
        echo dd($author);

        // $quote = $author->quotes()->create([]);

        // $contentData = array_get( $this->data, 'content.data' );
        // $contentData[ 'language_id' ] = array_get( $this->data, 'content.data.language_id' ) ?: array_get( $this->data, 'content.data.language.data.id' );
        // $quote->contents()->create( $contentData );

        // return $quote;
    }
}
