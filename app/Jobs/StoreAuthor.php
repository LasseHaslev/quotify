<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Author;

class StoreAuthor extends Job
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
        // If this Author is already created we return it
        if ( array_get( $this->data, 'data.id' ) ) return Author::find( array_get( $this->data, 'data.id' ) );
        return Author::create( array_get( $this->data, 'data' ) );
    }
}
